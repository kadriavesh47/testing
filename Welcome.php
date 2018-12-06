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
	public function index()
	{
		$this->load->view('welcome_message');
	}


	function loop()
	{
		$current_month = date('m');
		$current_year = date('Y');
		$year = '2016';
		$month = '8';
		
		for ($i=$year; $i <=$current_year; $i++) { 
				
			echo '<pre>';echo $i;

			if($i!=$current_year){
				$toMonth = 12;
			}else{
				$toMonth = $current_month;	
			}

			for ($j=$month; $j <= $toMonth; $j++) { 
				echo '<pre>';echo $j;
			}

			if($i!=$current_year){
				$month = 1;
				$toMonth = 12;
			}else{
				$month = 1;
				$toMonth = $current_month;	
			}
		}
	}

	function loopnew()
	{	
		$year = '2016';
		$cur_m='10';
		$mm='12';
		for($y=$year;$y<=2018;$y++){
			echo"<pre>";echo $y;
			for($m=$cur_m;$m<=$mm;$m++){
				echo"<pre>";echo $m;
			}
			if($year!=date('Y')){
				$cur_m=1;
			}else{
				$cur_m=date('m');
				$mm=date('m');
			}
			
		}
	}
}
