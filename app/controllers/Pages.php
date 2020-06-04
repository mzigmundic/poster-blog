<?php

class Pages extends Controller {

	public function __construct() {

	}

	public function index() {
		if (isLoggedIn()) {
			redirect('posts');
		}
		$data = [
			'title' => 'Poster',
			'description' => 'Log in to see posts'
		];
		$this->view('pages/index', $data);
	}

	public function about() {
		$data = [
			'title' => 'About',
			'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste facilis repudiandae sapiente explicabo veritatis? Ipsam nam ut sunt velit nesciunt nobis voluptatum! Numquam incidunt expedita molestiae fugit a ad eius.'
		];
		$this->view('pages/about', $data);
	}
}