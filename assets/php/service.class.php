<?php
class service
{
	public $name;
  public $code;
  public $errorCode;
	public $port;
	public $host;
	public $status;
  public $showToIp;
  public $hiddenCode;
	
	function __construct($name, $code, $errorCode, $port = null, $host = "localhost", $showToIp = null, $hiddenCode = null)
	{
		$this->code = $code;
    $this->errorCode = $errorCode;
		$this->port = $port;
		$this->host = $host;
    $this->name = $name;
    $this->showToIp = $showToIp;
    $this->hiddenCode = $hiddenCode;
		
		$this->status = $this->check_port();
	}
	
	function check_port()
	{
    if ($this->port !== null) {
		  $conn = @fsockopen($this->host, $this->port, $errno, $errstr, 20);
    
      if ($conn) {
		    fclose($conn);
		    return true;
	    } else {
        //echo $this->host . ":" . $this->port . " " . ($conn ? 'true' : 'false') . "<br />";
        echo "<div id='errorBar'>" . $this->name . ": " . "$errstr ($errno)</div>";
	      return false;
      }
	  }
  }
	
	function makeCode()
	{
		/*
    $icon = '<i class="icon-' . ($this->status ? 'ok' : 'remove') . ' icon-white"></i>';
		$btn = $this->status ? 'success' : 'warning';
		$prefix = $this->url == "" ? '<button class="btn btn-mini btn-' . $btn . ' disabled">' : '<a href="' . $this->url . '" class="btn btn-mini btn-' . $btn . '">';
		$txt = $this->status ? 'Online' : 'Offline';
		$suffix = $this->url == "" ? '</button>' : '</a>';
    */
    if ($this->port !== null) {
      if ($this->showToIp == $_SERVER['REMOTE_ADDR'] or $this->showToIp == null) {
        //echo $this->showToIp;
        $Result = $this->status ? $this->code : $this->errorCode;        
      } else {
        $Result = $this->hiddenCode;
      }
    } else {
      $Result = $this->code;
    }   

		
		return $Result /*. "<!-- " . ($this->status ? 'true' : 'false') . "  -->" */;
	}
}
?>