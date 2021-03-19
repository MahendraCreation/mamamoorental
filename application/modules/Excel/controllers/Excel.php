<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_excel');
	}

	public function CreateSewa(){
		if ($this->input->post('mulai') == null) {
			$sewa 		= $this->M_excel->riwayat_all();

		}else{
			$mulai 		= $this->input->post('mulai');
			$berakhir = $this->input->post('berakhir');

			$sewa 		= $this->M_excel->riwayat_filter($mulai, $berakhir);

		}

		$fileName = date("dmy").'_Laporan_Transaksi.xlsx';
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Kode Transaksi');
		$sheet->setCellValue('C1', 'Nama');
		$sheet->setCellValue('D1', 'No Telepon');
		$sheet->setCellValue('E1', 'Alamat');
		$sheet->setCellValue('F1', 'Kode POS');
		$sheet->setCellValue('G1', 'Produk / Unit');
		$sheet->setCellValue('H1', 'Tanggal Persewaan');
		$sheet->setCellValue('I1', 'Total Biaya');
		$rows = 2;
		$no   = 1;
		// ALAMAT, Diperpanjang
		foreach ($sewa as $val){
			$alamat = $val->JALAN.", ".$this->M_excel->find_kota($val->KOTA)." - ".$this->M_excel->find_kota($val->KECAMATAN).", ".$this->M_excel->find_kota($val->PROVINSI);
			$sheet->setCellValue('A' . $rows, $no);
			$sheet->setCellValue('B' . $rows, $val->KODE_TRANSAKSI);
			$sheet->setCellValue('C' . $rows, $val->NAMA);
			$sheet->setCellValue('D' . $rows, $val->HP);
			$sheet->setCellValue('E' . $rows, $val->alamat);
			$sheet->setCellValue('F' . $rows, $val->KODE_POS);
			$sheet->setCellValue('G' . $rows, $val->NAMA_PRODUK);
			$sheet->setCellValue('H' . $rows, date("d m Y", strtotime($val->tanggal)));
			$sheet->setCellValue('I' . $rows, $val->TOTAL);
			$rows++;
			$no++;
		}
		$writer = new Xlsx($spreadsheet);
		$writer->save("Excel/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
		redirect(base_url()."Excel/".$fileName);
	}

	public function CreateDeposit(){
		if ($this->input->post('mulai') == null) {
			$sewa 		= $this->M_excel->deposit_all();

		}else{
			$mulai 		= $this->input->post('mulai');
			$berakhir = $this->input->post('berakhir');

			$sewa 		= $this->M_excel->deposit_filter($mulai, $berakhir);

		}

		$fileName = date("dmy").'_Laporan_Deposit.xlsx';
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Kode Transaksi');
		$sheet->setCellValue('C1', 'Nama');
		$sheet->setCellValue('D1', 'No Telepon');
		$sheet->setCellValue('E1', 'BANK');
		$sheet->setCellValue('F1', 'No Rekening');
		$sheet->setCellValue('G1', 'Atas Nama');
		$sheet->setCellValue('H1', 'Permintaan Saldo');
		$rows = 2;
		$no   = 1;
		foreach ($sewa as $val){
			$sheet->setCellValue('A' . $rows, $no);
			$sheet->setCellValue('B' . $rows, $val->KODE_TRANSAKSI);
			$sheet->setCellValue('C' . $rows, $val->NAMA);
			$sheet->setCellValue('D' . $rows, $val->NO_TELP);
			$sheet->setCellValue('E' . $rows, $val->ALAMAT);
			$sheet->setCellValue('F' . $rows, $val->NAMA_PRODUK);
			$sheet->setCellValue('G' . $rows, $val->WAKTU_MULAI);
			$sheet->setCellValue('H' . $rows, $val->TOTAL);
			$rows++;
			$no++;
		}
		$writer = new Xlsx($spreadsheet);
		$writer->save("Excel/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
		redirect(base_url()."/upload/".$fileName);
	}

}
