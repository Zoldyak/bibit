<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct()
	 {
			 parent::__construct();
			   $this->load->library('MyPHPMailer'); // load library
	 }
	public function index()
	{
		$this->load->view('welcome_message');
	}


	function sendMail()
{
	$this->load->library('email');
$ci = get_instance();
$config['protocol'] = "smtp";
$config['smtp_host'] = "smtp.gmail.com";
$config['smtp_port'] = "465";
$config['smtp_user'] = "firman.akun1@gmail.com";
$config['smtp_pass'] = "@415102007";
$config['charset'] = "utf-8";
$config['mailtype'] = "html";
$config['newline'] = "\r\n";
$ci->email->initialize($config);
$ci->email->from('firman.akun1@gmail.com', 'Rumahweb');
$list = array('xxx@xxxx.com');
$ci->email->to('firman.akun2@gmail.com');
$ci->email->subject('judul email');
$ci->email->message('isi email');
if ($this->email->send()) {
echo 'Email sent.';
} else {
show_error($this->email->print_debugger());
}
}


function emailSend(){
			 $fromEmail = "firman.akun1@gmail.com";
			 $isiEmail = "Isi email tulis disini";
			 $mail = new PHPMailer();
			 $mail->IsHTML(true);    // set email format to HTML
			 $mail->IsSMTP();   // we are going to use SMTP
			 $mail->SMTPAuth   = true; // enabled SMTP authentication
			 $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
			 $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
			 $mail->Port       = 465;                   // SMTP port to connect to GMail
			 $mail->Username   = "$fromEmail";  // alamat email kamu
			 $mail->Password   = "@415102007";            // password GMail
			 $mail->SetFrom('firman.akun1@gmail.com', 'noreply');  //Siapa yg mengirim email
			 $mail->Subject    = "Subjek email";
			 $mail->Body       = $isiEmail;
			 $toEmail = "firman.akun2@gmail.com"; // siapa yg menerima email ini
			 $mail->AddAddress($toEmail);

			 if(!$mail->Send()) {
					 echo "Eror: ".$mail->ErrorInfo;
			 } else {
					 echo "Email berhasil dikirim";
			 }
	 }

	// function send(){
	// 	$this->load->library('email');
	//
	// $subject = 'This is a test';
	// $message = '<p>This message has been sent for testing purposes.</p>';
	//
	// // Get full html:
	// $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	// <html xmlns="http://www.w3.org/1999/xhtml">
	// <head>
	//     <meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
	//     <title>' . html_escape($subject) . '</title>
	//     <style type="text/css">
	//         body {
	//             font-family: Arial, Verdana, Helvetica, sans-serif;
	//             font-size: 16px;
	//         }
	//     </style>
	// </head>
	// <body>
	// ' . $message . '
	// </body>
	// </html>';
	// // Also, for getting full html you may use the following internal method:
	// //$body = $this->email->full_html($subject, $message);
	//
	// $result = $this->email
	//     ->from('firman.akun1@gmail.com')
	//     ->reply_to('yoursecondemail@somedomain.com')    // Optional, an account where a human being reads.
	//     ->to('firman.akun2@gmail.com')
	//     ->subject($subject)
	//     ->message($body)
	//     ->send();
	//
	// var_dump($result);
	// echo '<br />';
	// echo $this->email->print_debugger();
	//
	//
	//
	// }
	// function send2(){
	// 		require_once(APPPATH.'libraries/PHPMailerAutoload.php') ;
	// 	$Nama='FIRMAN 2';
	// 	$Email='firman.akun2@gmail.com';
	// 	$address='firman.akun2@gmail.com';
	//
	// 	$mail             = new PHPMailer();
	// 	$body             =
	// 	"<body style='margin: 10px;'>
	// 	<div style='width: 640px; font-family: Helvetica, sans-serif; font-size: 13px; padding:10px; line-height:150%; border:#eaeaea solid 10px;'>
	// 	<br>
	// 	<strong>Terima Kasih Telah Mendaftar</strong><br>
	// 	<b>Nama Anda : </b>".$Nama."<br>
	// 	<b>Email : </b>".$Email."<br>
	// 	<center> <a href='http://localhost/administrasi/verifikasiemail.php?user=".$Nama."&level=0' type='button' class='button'>Konfirmasi</a></center>
	// 	<br>
	// 	</div>
	// 	</body>";
	// 	$body             = eregi_replace("[\]",'',$body);
	// 	$mail->IsSMTP(); 	// menggunakan SMTP
	// 	$mail->SMTPDebug  = 1;   // mengaktifkan debug SMTP
	//
	// 	$mail->SMTPAuth = true;   // mengaktifkan Autentifikasi SMTP
	// 	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	// 	$mail->Port = 465;   // post gunakan port 25
	// 	$mail->Username = 'firman.akun1@gmail.com';  // username email akun
	// 	$mail->Password = '@415102007';       // password akun
	//
	// 	$mail->SetFrom('firman.akun1@gmail.com', 'Hello'.$Nama);
	//
	// 	$mail->Subject    = "Hello";
	// 	$mail->MsgHTML($body);
	//
	// 	$address = $Email; //email tujuan
	// 	$mail->AddAddress($address, "Hello (Reciever name)");
	//
	// 	if(!$mail->Send()) {
	// 		echo "Oops, Mailer Error: " . $mail->ErrorInfo;
	// 	} else {
	// 			echo "<script>alert('Silakan login untuk proses pembayaran ');window.location = 'index.php'</script>";
	// 	}
	// }
function coba2(){
	$load=$this->load;
	$load->view('frontend/coba0');
}
function coba3(){
	$query1=$this->db->select('sum(t1.total_transfer) as pemasukan_bulan,
														Sum(t1.jumlah_pengeluaran) AS pengeluaran_bulan,
														t2.id_rekap,
														MONTH(  `tanggal` ) AS bulan,
														YEAR(  `tanggal` ) AS tahun,
														t1.id_rekap AS rekap_id,
														t1.id_transaksi as idtransaksi,
														t2.sisa_bulan AS sisabulan')
		 ->from('transaksi as t1')
		 ->join('rekap as t2', 't1.id_rekap = t2.id_rekap','left')
		 ->where('status_pembayaran', 'Lunas')
		 ->group_by("t1.id_rekap,bulan,tahun")
		 ->get();
$result=$query1->result_array();
print_r($result);
// 		 $query=$this->db->query("SELECT
// Sum(transaksi.total_transfer) AS pemasukan_bulan,
// Sum(transaksi.jumlah_pengeluaran) AS pengeluaran_bulan,
// rekap.id_rekap,
// MONTH(  `tanggal` ) AS bulan,
// YEAR(  `tanggal` ) AS tahun,
// transaksi.id_rekap AS rekap_id,
// transaksi.id_transaksi as idtransaksi,
// rekap.sisa_bulan AS sisabulan
// FROM
// transaksi
// LEFT JOIN rekap ON transaksi.id_rekap = rekap.id_rekap
// WHERE
// transaksi.status_pembayaran = 'Lunas'
// GROUP BY
// transaksi.id_rekap,
// bulan,
// tahun
// ");
}


}
