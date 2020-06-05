<?php 
  class BaseUrl  {
        protected $url;
        
        public function setBaseUrl($data) {
            $this->url = $data;

            return $this->url;
        }

        public function getBaseUrl() {
            return $this->url;
        }
    }

    $url = new BaseUrl();
    $url->setBaseUrl('http://localhost/messagingApp');
    $baseUrl = $url->getBaseUrl();
?>