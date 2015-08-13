<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('max_execution_time', 300);
class Essay extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('essay_model');
		$this->load->helper('doms_helper');
		$this->load->helper('text');
		$this->load->library('spellcorrector');
	}

	public function index()
	{
		$data['test'] = 'hi';
		$this->load->view('essay_view', $data);
	}

	public function get_essay()
	{
		$data = $this->essay_model->get_essay();

		printr_wrap($data);
	}

	public function get_keywords($id = 0)
	{
		
		// $id = isset($id) ? $id : '1';
		$data = $this->essay_model->get_keywords($id);

		printr_wrap($data);
	}

	public function get_essay_with_keywords($id = null)
	{
		$keywords 	= [];
		$essay 		= [];
		$keyword_ids = [];

		$essay = $this->essay_model->get_essay($id);
		
		foreach($essay as $value)
		{
			array_push($keyword_ids,$value->id);
		}

		$keywords = $this->essay_model->get_keywords($keyword_ids);

		$data['essay'] = $essay;
		$data['keywords'] = $keywords;
		$key_combination_main = array();
		foreach($data['essay'] as $key => $e) {
			$ess = preg_split("/[\s,.]+/",strtolower($e->essay));

			foreach($keywords as $k => $keyword) {

				if($keyword->essay_id == $e->id) {
					$temp = explode(' ',strtolower($keyword->keyword));
					$word[$k] = $temp;
					$key_word_count = count($word[$k]);
					
					$counter = 0;

					$key_combination = [];
					
					$temp_str = '';
					
					
						if(count($ess) > 0) {
							for($i = 0; $i < count($ess); $i++) {
								$temp_str .= $ess[$i] . ' ';
								// printr_wrap($word[$k]);
								// echo $temp_str . ' - '. $counter . ' ' . $key_word_count.' <br>';

								if($counter == $key_word_count-1)
								{
									$to_push = trim($temp_str," ");

									array_push($key_combination,$to_push);
									
									$temp_str = '';
									
									$counter = 0;
									if($key_word_count > 1)
										--$i;
								}
								else
									$counter++;

							}
						}
						$key_combination_main[$k] = $key_combination;
					
				}
			}
			// dd($key_combination_main);
			$data['essay'][$key] = $e;

		}
		// dd($key_combination_main);
		$essay_keywords = [];

		foreach($keywords as $key => $val) {
			$t = [];
			foreach($key_combination_main[$key] as $k => $v) {
				$str1 = strlen($v) > strlen($val->keyword) ? $v : $val->keyword;
				$str2 = strlen($v) <= strlen($val->keyword) ? $v : $val->keyword;

				similar_text(strtolower($str1), strtolower($str2),$sim);
				$t[$key] = $v . ' => ' . $val->keyword . ' - ' . $sim . ' str1: ' . strlen($str1) . '; str2: ' . strlen($str2); 
				
				$percentage = count(explode(' ',$v)) > 1 ? 90 : 85;
				

				if($sim >= $percentage) {
					array_push($essay_keywords, $v);

				}
			}
		}
		
		// printr_wrap($essay_keywords);
		// printr_wrap($keywords);
		// dd($essay_keywords);
		foreach($essay_keywords as $val) {
			$e->essay = highlight_phrase($e->essay, $val,'<span class="highlighter">','</span>');
		}

		$data['correct'] = '$correct';

		$this->load->view('essay_view', $data);

	}


	public function spell_check($string = '', array $keywords)
	{
		$train_data = [];
		foreach($keywords as $val) {
			array_push($train_data, $val->keyword);
		}

		$this->spellcorrector->train($train_data);

		$correct = $this->spellcorrector->correct($string);
		return $correct;
	}
}
