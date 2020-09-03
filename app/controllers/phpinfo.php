<?php

class PhpInfo extends Controller implements Handlers {
  
  protected $output;
  protected $results;
  
  public function __construct($controller, $method) {
    parent::__construct($controller, $method);
            
    # Any models required to interact with this controller should be loaded here    
    $this->load_model("PageModel");
    
    # Instantiate custom view output
    $this->output = new PageView();
    
  }

  public function info() {
    phpinfo();
  }
  
  # Not found handler
  public function not_found() {     
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