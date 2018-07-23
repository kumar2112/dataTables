<?php
require_once('connection.php');

$countQuery="SELECT count(*) as total FROM core_logs";
$resultCount = $conn->query($countQuery);
$totalRecords=$resultCount->fetch_assoc();

$start=0;
$length=10;
if(isset($_GET['start'])){
    $start=$_GET['start'];
}
if(isset($_GET['length'])){
    $length=$_GET['length'];
}

$dataArray=array();
$sql="SELECT * FROM core_logs limit ".$start.','.$length;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $dataArray['draw']=$_GET['draw'];
        $dataArray['recordsTotal']=$totalRecords['total'];
        $dataArray['recordsFiltered']=$totalRecords['total'];
        $dataArray['data'][]=array(
           'DT_RowId'=>'row_'.$row['core_log_id'],
           'DT_RowData'=>['pkey'=>$row['core_log_id']],
           'table_name'=>$row['table_name'],
           'field_display_name'=>$row['field_display_name'],
           'log_section'=>$row['log_section'],
           'log_sub_section'=>$row['log_sub_section'],
           'is_log_viewed'=>$row['is_log_viewed']
        );
       //$dataArray['data'][]=[$row['table_name'],$row['field_display_name'],"<b>".$row['log_section']."</b>",$row['log_sub_section'],$row['is_log_viewed']];
    }
    $dataArray['options']=[];
    $dataArray['files']=[];
} else {
    echo "0 results";
}
$conn->close();
//echo "<pre>";
echo json_encode($dataArray);