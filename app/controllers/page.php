<?php

class Page extends Controller implements Handlers {
  
  protected $output;
  protected $results;
  
  public function __construct($controller, $method) {
    parent::__construct($controller, $method);
            
    # Any models required to interact with this controller should be loaded here    
    $this->load_model("PageModel");
    
    # Instantiate custom view output
    $this->output = new PageView();
    
    $this->cache_control();
  }
    
  public function home() {
    $this->get_model("PageModel")->page_title = "Home";
    $this->build_page("home");
  }
  
  public function about_us() {
    $this->get_model("PageModel")->page_title = "About";
    $this->build_page("about");
  }
  
  public function our_team() {
    $this->get_model("PageModel")->page_title = "Our Team";
    $this->build_page("our-team");
  }
  
  public function your_needs() {
    $this->get_model("PageModel")->page_title = "Your Needs";
    $this->build_page("under-construction");
  }
  
  public function our_products() {
    $this->get_model("PageModel")->page_title = "Our Products";
    $this->build_page("under-construction");
  }
  
  public function deployment() {
    $this->get_model("PageModel")->page_title = "Deployment";
    $this->build_page("under-construction");
  }
  
  public function the_science() {
    $this->get_model("PageModel")->page_title = "The Science";
    $this->build_page("under-construction");
  }
  
  public function contact() {
    $this->get_model("PageModel")->page_title = "Contact";
    $this->build_page("under-construction");
  }
  
  public function login() {
    $this->get_model("PageModel")->page_title = "Login";
    $this->build_page("under-construction");
  }
  
  public function feedback() {
    $this->get_model("PageModel")->page_title = "Login";
    $this->build_page("under-construction");
  }
  
  public function x_5() {
    $this->get_model("PageModel")->page_title = "X-5";
    $this->build_page("x-5");
  }
  
  public function px_5() {
    $this->get_model("PageModel")->page_title = "X-5";
    $this->build_page("px-5");
  }
  
  public function x_10() {
    $this->get_model("PageModel")->page_title = "X-10";
    $this->build_page("x-10");
  }
  
  public function x_20() {
    $this->get_model("PageModel")->page_title = "X-20";
    $this->build_page("x-20");
  }
  
  public function x_30() {
    $this->get_model("PageModel")->page_title = "X-30";
    $this->build_page("x-30");
  }
  
  public function x_50() {
    $this->get_model("PageModel")->page_title = "X-50";
    $this->build_page("x-50");
  }
        
  # Not found handler
  public function not_found() {     
    # 404 page
    $this->get_model("PageModel")->page_title = "Not found";
    $this->build_page("not-found");
  }
  
  protected function cache_control() {
    $path = $_SERVER["DOCUMENT_ROOT"] . DS . "public" . DS;
    $css = $path . "css" . DS ."global.css";
    
    $versions = array(      
      "VERSION" => filemtime($css),
    );
    
    $this->output->add_localearray($versions);
  }
  
  # Controller/Model/View link
  protected function build_page($page_name) {    
    $html_src = $this->get_model("PageModel")->get_page($page_name);    
    $html = $this->output->replace_localizations($html_src);
    
    $this->get_view()->render($html);
  }
  
}

?>
