<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Process extends CI_Controller {

	public function index()
	// when user go to localhost -> form html page will be presented
	{
		if ($this->session->userdata('gold')==false)
		{ // if not set, then set it now :)
			$this->session->set_userdata('gold',0);
			// if gold was set, that also means NO activities -> then SET UP an ampty ACTIVITIES array  !!! MISTAKE I MADE
			$this->session->set_userdata('activites', array()); 
		}
// everytime user goes to index very first time -> gold = 0 as start and activites array is unset
// can only erase data on the screen -> NOT erase data in DATABASE!
		$this->session->set_userdata('gold',0);
		$this->session->unset_userdata('activities');

// since $this->load->view('index.php',$gold); ->  only takes ONE associated array
// BEST KEEP ONE array -> with 'gold earned' and 'activities' under SAME ARRAY ->
// -> BUT those 2 variables are different kind (one is individual num, another one is array-> 
// would not work ->better to just set each as individual ! -> then call it on index.php (view file)
// one by one
//       $this->session->set_userdata('gold',0);
//       $this->session->set_userdata('activites', array()); 

		$this->load->view('index.php');
		// this is bring user to another page -> MUST do this at the end of function!
	}

	// specify length of the output
	public function farm()
	{
		// echo "farm";
		$points = rand(10,20);
		$x = $this->session->userdata('gold') + $points;
		// echo $x;

		$this->session->set_userdata('gold',$x);
		// replace old gold with newly added up gold $x

// $activity[] = "You have earned ".$points." gold" ; -->traditional php syntax

 // !!! MISTAKE I MADE below
// codelgniter syntax:
// 1. grab current content of WHOLE activities array -> store to $y 
		$y = $this->session->userdata('activities');
// 2. add NEW activities to end of ARRAY y -> y[]
		$y[] = "You went to a farm and you have earned ".$points." gold";
		
		$this->session->set_userdata('activities',$y);

		$this->load->view('index.php');
	}

	public function cave()
	{
		// echo 'cave';
		$points = rand(5,10);
		$x = $this->session->userdata('gold') + $points;
		$this->session->set_userdata('gold',$x);

		$y = $this->session->userdata('activities');
		$y[] = "You went to a cave and you have earned ".$points." gold";
		$this->session->set_userdata('activities',$y);

		// need to pass associated array!
		$this->load->view('index.php');
	}

	public function house()
	{
		// echo 'house';
		$points = rand(2,5);
		$x = $this->session->userdata('gold') + $points;
		$this->session->set_userdata('gold', $x);

		$y = $this->session->userdata('activities');
		$y[] = "You went to a house and you have earned ".$points." gold";
		$this->session->set_userdata('activities',$y);

		// need to pass associated array!
		$this->load->view('index.php');
	}

	public function casino()
	{
		// echo 'casino';
		$draw = rand(0,1);
		$points = rand(0,50);

		if ($draw )  // win
		{
			// echo "TRUE";
			$x = $this->session->userdata('gold') + $points;
			$this->session->set_userdata('gold',$x);

			$y = $this->session->userdata('activities');
			$y[] = "You went to a casino and you have earned ".$points." gold";
			$this->session->set_userdata('activities',$y);

			// need to pass associated array $gold !
			$this->load->view('index.php');
		}
		else         // lose
		{
			// echo "False";
			$x = $this->session->userdata('gold') - $points;
			$this->session->set_userdata('gold',$x);

			$y = $this->session->userdata('activities');
			$y[] = "You went to a casino and you have lost ".$points." gold";
			$this->session->set_userdata('activities',$y);

		// need to pass associate array... that's why need to set one above this line
			$this->load->view('index.php');
		}	
	}

	public function reset()
		{	// reset and go to localhost:8888 directly are two diff events,
// want either one event will reset all data in session gold AND activities associate array
			$this->session->unset_userdata('activities');
			$this->session->set_userdata('gold',0);
			$this->load->view('index.php');
		}	
}







