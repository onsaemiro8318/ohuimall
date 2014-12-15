<?php

include_once "../config.php";
$sDate = $_REQUEST['sDate'];
$eDate = $_REQUEST['eDate'];
$search_type = $_REQUEST['search_type'];
$search_txt = $_REQUEST['search_txt'];
$where = "";

if ($sDate != "")
	$where	.= " AND buyer_date >= '".$sDate."' AND buyer_date <= '".$eDate." 23:59:59'";

if ($search_txt != "")
	$where	.= " AND ".$search_type." like '%".$search_txt."%'";

$buyer_count_query = "SELECT count(*) FROM ".$_gl['buyer_info_table']." WHERE 1".$where."";
list($buyer_count) = @mysqli_fetch_array(mysqli_query($my_db, $buyer_count_query));
$buyer_list_query = "SELECT * FROM ".$_gl['buyer_info_table']." WHERE 1 ".$where." Order by idx DESC";
$result = mysqli_query($my_db, $buyer_list_query);
if (!$buyer_count) {
    alert("출력할 내역이 없습니다.");
}

/** PHPExcel */
require_once("../lib/PHPExcel/Classes/PHPExcel.php");
/* PHPExcel.php 파일의 경로를 정확하게 지정해준다. */

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set properties
// Excel 문서 속성을 지정해주는 부분이다. 적당히 수정하면 된다.
$objPHPExcel->getProperties()->setCreator("작성자")
                             ->setLastModifiedBy("최종수정자")
                             ->setTitle("참여자목록")
                             ->setSubject("마음구매자")
                             ->setDescription("오휘마음구매자목록")
                             ->setKeywords("마음구매자")
                             ->setCategory("buyerlist");

// Add some data
// Excel 파일의 각 셀의 타이틀을 정해준다.
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A1", "이름")
            ->setCellValue("B1", "전화번호")
            ->setCellValue("C1", "IP주소")
            ->setCellValue("D1", "구매상품")
            ->setCellValue("E1", "구매일자")
            ->setCellValue("F1", "유입구분");

// for 문을 이용해 DB에서 가져온 데이터를 순차적으로 입력한다.
// 변수 i의 값은 2부터 시작하도록 해야한다.
for ($i=2; $row=mysqli_fetch_array($result); $i++)
{   
    // Add some data
    $phone = " ".$row[buyer_phone];
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue("A$i", "$row[buyer_name]")
                ->setCellValue("B$i", "$phone")
                ->setCellValue("C$i", "$row[buyer_ipaddr]")
                ->setCellValue("D$i", "$row[buyer_goods]")
                ->setCellValue("E$i", "$row[buyer_date]")
                ->setCellValue("F$i", "$row[buyer_gubun]");
}

// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle("참여자목록");

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// 파일의 저장형식이 utf-8일 경우 한글파일 이름은 깨지므로 euc-kr로 변환해준다.
// $filename = iconv("UTF-8", "EUC-KR", "참여자목록");
$filename = "test-excel";

// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel;charset=utf-8');
header('Content-Type: application/x-msexcel;charset=utf-8');
header('Content-Disposition: attachment;filename="' . $filename . '.xls"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>