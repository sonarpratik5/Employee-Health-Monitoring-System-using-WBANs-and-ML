<?php
// Include the TCPDF library
require_once('tcpdf/tcpdf.php');
include "connection.php";
$int_id=$_GET['id'];
// $int_id=1;
// $select = "SELECT * FROM medical where emp_id = $int_id";
$select = "SELECT employee.name, employee.designation, medical.*
FROM employee
INNER JOIN medical ON employee.id=medical.emp_id WHERE employee.id=$int_id ;";

$data = mysqli_query($conn,$select);
$row = mysqli_fetch_array($data);

$name = $row['name'];
$designation = $row['designation'];
$age = $row['age'];
$gender = $row['gender'];
$diabetic = $row['diabetic'];
$cholesterol = $row['cholesterol'];
$family = $row['family'];
$allergies = $row['allergies'];
$height = $row['height'];
$weight = $row['weight'];
$exercise = $row['exercise'];
$medication = $row['medication'];

class MYPDF extends TCPDF {

	public function MultiRow($left, $right) {
		// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0)

		$page_start = $this->getPage();
		$y_start = $this->GetY();

		// write the left cell
		$this->MultiCell(40, 0, $left, 1, 'R', 1, 2, '', '', true, 0);

		$page_end_1 = $this->getPage();
		$y_end_1 = $this->GetY();

		$this->setPage($page_start);

		// write the right cell
		$this->MultiCell(0, 0, $right, 1, 'J', 0, 1, $this->GetX() ,$y_start, true, 0);

		$page_end_2 = $this->getPage();
		$y_end_2 = $this->GetY();

		// set the new row position by case
		if (max($page_end_1,$page_end_2) == $page_start) {
			$ynew = max($y_end_1, $y_end_2);
		} elseif ($page_end_1 == $page_end_2) {
			$ynew = max($y_end_1, $y_end_2);
		} elseif ($page_end_1 > $page_end_2) {
			$ynew = $y_end_1;
		} else {
			$ynew = $y_end_2;
		}

		$this->setPage(max($page_end_1,$page_end_2));
		$this->setXY($this->GetX(),$ynew);
	}

}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Nicola Asuni');
$pdf->setTitle('TCPDF Example 020');
$pdf->setSubject('TCPDF Tutorial');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->setFont('helvetica', '', 20);
// add a page
$pdf->AddPage();

$pdf->Write(0, $name, '', 0, 'L', true, 0, false, false, 0);
$pdf->setFont('times', '', 11);
$pdf->Write(0, $designation, '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(6.5);


$pdf->setFont('times', '', 11);

$pdf->setCellPadding(3);
// $pdf->setLineWidth(2);

// set color for background
$pdf->setFillColor(134, 187, 252);


// print some rows just as example

$pdf->MultiRow('Name ', $name."\n");
$pdf->MultiRow('Age ', $age."\n");
$pdf->MultiRow('Gender ', $gender."\n");
$pdf->MultiRow('Diabetic ', $diabetic."\n");
$pdf->MultiRow('Cholesterol ', $cholesterol."\n");
$pdf->MultiRow('Family History ', $family."\n");
$pdf->MultiRow('Allergies ', $allergies."\n");
$pdf->MultiRow('Height ', $height."\n");
$pdf->MultiRow('Weight ', $weight."\n");
$pdf->MultiRow('Exercise ', $exercise."\n");
$pdf->MultiRow('Medication ', $medication."\n");
// $pdf->MultiRow('Row '.($i+1), $text."\n");


// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output($name.'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
