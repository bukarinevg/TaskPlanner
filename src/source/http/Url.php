<?php 
namespace app\source\http;

class Url {
    protected $protocol;
    protected $host;
    protected $path;
    protected $query;

    public function __construct( $server) {
        $this->protocol = isset($server['HTTPS']) && $server['HTTPS'] === 'on' ? "https" : "http";
        $this->host = $server['HTTP_HOST'];
        $this->path = parse_url($server['REQUEST_URI'], PHP_URL_PATH);
        $this->query = parse_url($server['REQUEST_URI'], PHP_URL_QUERY);
    }

    public function getProtocol() {
        return $this->protocol;
    }

    public function getHost() {
        return $this->host;
    }

    public function getPath() {
        return $this->path;
    }

    public function getQuery() {
        return $this->query;
    }

    public function __toString() {
        $url = $this->protocol . '://' . $this->host . $this->path;
        if (!empty($this->query)) {
            $url .= '?' . http_build_query($this->query);
        }
        return $url;
    }
}
