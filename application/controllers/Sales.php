<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Mpdf\Mpdf;

class Sales extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Sales_model", "sales");
	}

	public function index()
	{
		$data['response'] = '';
		$post = $this->input->post();
		if (isset($post['btnDelete'])) {
			$data['response'] = ($this->sales->deleteSale($post['btnDelete'])) ? msg_success("Sales `ID#" . id_format($post['btnDelete']) . "` Deleted") : msg_error("Oops Something Went Wrong!");
		}
		$data['list'] = $this->sales->getAll();
		$this->template("pages/sales/index", $data);
	}


	public function view($id = null)
	{
		$data['response'] = '';
		$data['id'] = $id;
		$res = $this->sales->get($id);
		if ($this->session->current->role_id != 1 && $res->row()->role_id == 1) {
			return $this->template("errors/error");
		}
		if (!empty($id) && ($res->num_rows() > 0)) {
			$data['sale'] = $res->row();
			$data['sale_items'] = $this->sales->get_items($id)->result_array();
			$this->template("pages/sales/view", $data);
		} else {
			redirect("sales");
		}
	}

	public function create()
	{
		$data['response'] = '';
		$data['mode'] = $this->sales->paymentMethods();
		$data['source'] = $this->sales->sourceType();
		$data['sales_id'] = $this->sales->getLastId() + 1;
		$post = $this->input->post();
		if (isset($post['btnPrint'])) {
			$this->generatePdf();
			die;
		}
		if (isset($post['btnCreate'])) {
			$data['response'] = ($this->sales->saveSale()) ? msg_success("Sale Created") : msg_error("Oops Something Went Wrong!");
		}
		$this->template('pages/sales/create', $data);
	}

	private function generatePdf()
	{
		$tmp_payments = $this->sales->paymentMethods();
		$tmp_sources  = $this->sales->sourceType();
		$payment = $sources = array();
		foreach ($tmp_payments as $res) {
			$payment[$res['id']] = $res['name'];
		}
		foreach ($tmp_sources as $res) {
			$sources[$res['id']] = $res['name'];
		}
		$post =  $this->input->post();

		$table = '';
		$qty = $price = $discount = $total = 0;
		if (isset($post['item_name']) && count($post['item_name']) > 0) {
			foreach ($post['item_name'] as $key => $value) {
				$linetotal = $post['item_qty'][$key] * $post['item_price'][$key] - $post['item_discount'][$key];
				$table .= '<tr class="item">
					<td>' . $value . '</td>
					<td class="r">' . number_format($post['item_qty'][$key]) . '</td>
					<td class="r">' . number_format($post['item_price'][$key], 2) . '</td>
					<td class="r">' . number_format($post['item_discount'][$key], 2) . '</td>
					<td class="r">' . number_format($linetotal, 2) . '</td>
				</tr>';
				$qty += $post['item_qty'][$key];
				$price += $post['item_price'][$key];
				$discount += $post['item_discount'][$key];
				$total += $linetotal;
			}
		}
		$table .= '<tr class="item">
					<td class="l b"> SubTotal</td>
					<td class="r b">' . number_format($qty) . '</td>
					<td class="r b">' . number_format($price, 2) . '</td>
					<td class="r b">' . number_format($discount, 2) . '</td>
					<td class="r b" style=""><u>' . number_format($total, 2) . '</u></td>
				</tr>';
		$table .= '<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td class="r b">TOTAL</td>
				</tr>';
		$html = '
<html>
	<head>
		<meta charset="utf-8" />
		<title>Invoice</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
		<style>
.r{
text-align:right!important;
}
.l{
text-align:left!important;
}
.b{
font-weight:bold;}
			.invoice-box {
				padding: 30px;
				border: 1px solid #eee;
				font-size: 16px;
				line-height: 24px;
				font-family: "Montserrat", "Helvetica Neue", Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title" >
									<h4 style="width: 100%; max-width: 300px">SHARK AUTO PARTS</h4>
								</td>

								<td>
									ReceiptID#' . id_format($post['id']) . '<br />
									Officer: ' . $post['officer'] . '<br />
									Date: ' . date("M d, Y", strtotime($post['date'])) . '
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									' . $post['address'] . ',<br />
									' . $post['barangay'] . ',<br />
									' . $post['province'] . ',' . $post['city'] . '
								</td>

								<td>
									<br />
								' . $post['first'] . ' ' . $post['middle'] . ' ' . $post['last'] . ' <br />
								' . $post['contact'] . ' 
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Payment Method</td>
					<td>Sales Source</td>
				</tr>
				<tr class="details">
					<td>' . $payment[$post['mode']] . '</td>
					<td>' . $sources[$post['source']] . '</td>
				</tr>
			</table>
<table>
				<tr class="heading">
					<td>Particulars</td>
					<td class="r">Qty</td>
					<td class="r">Unit Price</td>
					<td class="r">Discount</td>
					<td class="r">Line Total</td>
				</tr>
			' . $table . '
<tr class="heading">
					<td class="l" colspan="5">Remarks</td>
				</tr>
<tr class="item">
					<td class="l" colspan="5">' . $post['remarks'] . '</td>
				</tr>
</table>
<div "style=text-align:center!important">
Thank You For Your Business!
</div>
		</div>
	</body>
</html>
';
		$mpdf = new \Mpdf\Mpdf();
		//[ 'margin_left' => 20,
		// 'margin_right' => 15,
		// 'margin_top' => 10,
		// 'margin_bottom' => 25,
		// 'margin_header' => 10,
		// 'margin_footer' => 10]

		$mpdf->SetProtection(array('print'));
		$mpdf->SetTitle("Acme Trading Co. - Invoice");
		$mpdf->SetAuthor("Acme Trading Co.");
		$mpdf->SetWatermarkText("Paid");
		$mpdf->showWatermarkText = true;
		$mpdf->watermark_font = 'DejaVuSansCondensed';
		$mpdf->watermarkTextAlpha = 0.1;
		$mpdf->SetDisplayMode('fullpage');
		$mpdf->DefHTMLFooterByName(
			'Chapter2Footer',
			'<div style="text-align: right; font-weight: bold; font-size: 8pt; 
  font-style: italic;">Chapter 2 Footer</div>'
		);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}
}
