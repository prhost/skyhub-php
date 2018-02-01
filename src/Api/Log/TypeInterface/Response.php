<?php

namespace SkyHub\Api\Log\TypeInterface;

use SkyHub\Api\Handler\Response\HandlerInterface;
use SkyHub\Api\Handler\Response\HandlerInterfaceException;
use SkyHub\Api\Handler\Response\HandlerInterfaceSuccess;

class Response extends TypeAbstract implements TypeResponseInterface
{
    
    /**
     * Request constructor.
     *
     * @param int          $requestId
     * @param string|array $body
     * @param array        $headers
     * @param string       $statusCode
     * @param string       $protocolVersion
     */
    public function __construct(
        $requestId,
        $body = null,
        array $headers = [],
        $statusCode = null,
        $protocolVersion = null
    )
    {
        parent::__construct($requestId, $body, $headers, $protocolVersion);
        $this->setStatusCode($statusCode);
    }
    
    
    /**
     * @param string $status
     *
     * @return $this
     */
    public function setStatusCode($status = null)
    {
        $this->data['status_code'] = $status;
        return $this;
    }
    
    
    /**
     * @param HandlerInterfaceSuccess $handler
     *
     * @return $this
     */
    public function importResponseHandler(HandlerInterfaceSuccess $handler)
    {
        $this->setCustomMessage('Success in request.');
        $this->data = array_merge($this->data, $handler->export());
        
        return $this;
    }
    
    
    /**
     * @param HandlerInterfaceException $handler
     *
     * @return $this
     */
    public function importResponseExceptionHandler(HandlerInterfaceException $handler)
    {
        $this->setCustomMessage('Error in request.');
        $this->data = array_merge($this->data, $handler->export());
        
        return $this;
    }
    
}
