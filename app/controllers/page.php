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
  }
    
  public function home() {
    $this->get_model("PageModel")->page_title = "Home";
    $this->build_page("home");
  }
  
  public function about() {
    $this->get_model("PageModel")->page_title = "About";
    $this->build_page("under-construction");
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
        
  # Not found handler
  public function not_found():void {     
    # 404 page
    $this->get_model("PageModel")->page_title = "Not found";
    $this->build_page("not-found");
  }
  
  # Controller/Model/View link
  protected function build_page($page_name) {    
    $html_src = $this->get_model("PageModel")->get_page($page_name);    
    $html = $this->output->replace_localizations($html_src);
    
    $this->get_view()->render($html);
  }
  
}

?>
