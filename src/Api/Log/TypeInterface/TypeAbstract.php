<?php

namespace SkyHub\Api\Log\TypeInterface;

abstract class TypeAbstract implements TypeInterface
{
    
    /** @var array */
    protected $data = [];
    
    
    /**
     * Request constructor.
     *
     * @param int          $requestId
     * @param string|array $body
     * @param array        $headers
     * @param string       $httpVersion
     */
    public function __construct($requestId, $body = null, array $headers = [], $protocolVersion = null)
    {
        $this->setRequestId($requestId)
             ->setBody($body)
             ->setHeaders($headers)
             ->setProtocolVersion($protocolVersion);
    }
    
    
    /**
     * @return string
     */
    public function __toString()
    {
        return json_encode((array) $this->data);
    }
    
    
    /**
     * @param string|array $id
     *
     * @return $this
     */
    public function setRequestId($id = null)
    {
        $this->data['request_id'] = $id;
        return $this;
    }
    
    
    /**
     * @param string|object|array $body
     *
     * @return $this
     */
    public function setBody($body = null)
    {
        if (is_object($body)) {
            $body = (string) $body;
        }
        
        $this->data['body'] = $body;
        return $this;
    }
    
    
    /**
     * @param string $message
     *
     * @return $this
     */
    public function setCustomMessage($message = null)
    {
        $this->data['custom_message'] = (string) $message;
        return $this;
    }
    
    
    /**
     * @param array $headers
     */
    public function setHeaders(array $headers = [])
    {
        $this->data['headers'] = $headers;
        return $this;
    }
    
    
    /**
     * @param string $version
     */
    public function setProtocolVersion($version = null)
    {
        $this->data['protocol_version'] = $version;
        return $this;
    }
    
}
