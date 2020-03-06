<?php

namespace Msossai91\Easegex;

use Msossai91\Easegex\Util\Error;

class Easegex
{
    private $pattern;
    private $subject;
    private $flag;
    private $offset;

    /**
     * Instantiate the Easegex class by filling or not the fields for match
     * 
     * @param ?string $pattern
     * @param ?string $subject
     * @param ?int $flag
     * @param int $offset
     * 
     * @return Easegex
     */
    public function __construct(?string $pattern = null, ?string $subject = null, ?int $flag = null, int $offset = 0)
    {
        $this->pattern = $pattern;
        $this->subject = $subject;
        $this->flag = $flag;
        $this->offset = $offset;
    }

    /**
     * Instantiate the Easegex class statically by filling or not the fields for match
     * 
     * @param ?string $pattern
     * @param ?string $subject
     * @param ?int $flag
     * @param int $offset
     * 
     * @return Easegex
     */
    public static function regex(?string $pattern = null, ?string $subject = null, ?int $flag = null, int $offset = 0)
    {
        return (new Easegex($pattern, $subject, $flag, $offset));
    }

    /**
     * Set the regex pattern
     * 
     * @param string $pattern
     * 
     * @return Easegex
     */
    public function setPattern(string $pattern)
    {
        $this->pattern = $pattern;

        return $this;
    }

    /**
     * Set the regex subject
     * 
     * @param string $subject
     * 
     * @return Easegex
     */
    public function setsubject(string $subject)
    {
        $this->subject = $subject;
        
        return $this;
    }

    /**
     * Set the regex flag
     * 
     * @param int $flag
     * 
     * @return Easegex
     */
    public function setFlag(int $flag)
    {
        $this->flag = $flag;

        return $this;
    }

    /**
     * Set the regex offset
     * 
     * @param string $offset
     * 
     * @return Easegex
     */
    public function setOffset(int $offset)
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * Set the regex flag "PREG_OFFSET_CAPTURE"
     * 
     * @return Easegex
     */
    public function setFlagOffsetCapture()
    {
        $this->flag = PREG_OFFSET_CAPTURE;

        return $this;
    }

    /**
     * Set the regex flag "PREG_UNMATCHED_AS_NULL"
     * 
     * @return Easegex
     */
    public function setFlagUnmatchedAsNull()
    {
        $this->flag = PREG_UNMATCHED_AS_NULL;

        return $this;
    }

    /**
     * Set the regex flag "PREG_PATTERN_ORDER"
     * 
     * @return Easegex
     */
    public function setFlagPatternOrder()
    {
        $this->flag = PREG_PATTERN_ORDER;

        return $this;
    }

    /**
     * Set the regex flag "PREG_SET_ORDER"
     * 
     * @return Easegex
     */
    public function setFlagSetOrder()
    {
        $this->flag = PREG_SET_ORDER;

        return $this;
    }

    /**
     * Perform a regular expression match
     * 
     * @return ?array
     */
    public function match()
    {
        $this->verifyPassedFields();

        if(!preg_match($this->pattern, $this->subject, $match, $this->flag, $this->offset))
        {
            return false;
        }

        return $match;
    }

    /**
     * Perform a global regular expression match
     * 
     * @return ?array
     */
    public function matchAll()
    {
        $this->verifyPassedFields();

        if(!preg_match_all($this->pattern, $this->subject, $matches, $this->flag, $this->offset))
        {
            return false;
        }

        return $matches;
    }

    /**
     * Verify if fields were valid
     * 
     * @param bool #matchAll false
     * 
     * @return bool
     */
    public function verifyPassedFields(bool $matchAll = false)
    {
        if($this->pattern == null)
        {
            Error::throw('Pattern should not be null', 'EMPTY_FIELD');
        }

        if($this->subject == null)
        {
            Error::throw('Subject should not be null', 'EMPTY_FIELD');
        }

        if($this->flag != 0 && $this->flag != PREG_OFFSET_CAPTURE && $this->flag != PREG_UNMATCHED_AS_NULL)
        {
            Error::throw('Invalid flag for match', 'INVALID_FLAG');
        }
        
        if($matchAll)
        {
            if( $this->flag != 0 && 
                $this->flag != PREG_OFFSET_CAPTURE && 
                $this->flag != PREG_UNMATCHED_AS_NULL && 
                $this->flag != PREG_PATTERN_ORDER &&
                $this->flag != PREG_SET_ORDER)
            {
                Error::throw('Invalid flag for match all', 'INVALID_FLAG');
            }
        }

        return true;
    }
}