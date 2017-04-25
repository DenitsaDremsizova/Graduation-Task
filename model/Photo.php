<?php

class Photo implements JsonSerializable {

    protected $userId;
    protected $id;
    protected $timestamp;
    protected $file;
    protected $isProfilePic;
    protected $isCoverPic;
    protected $numberInGallery;

    public function __construct($userId, $id=null, $timestamp=null, $file=null, $isProfilePic=null, $isCoverPic=null, $numberInGallery=null) {
        $this->userId = $userId;
        $this->id = $id;
        $this->timestamp = $timestamp;
        $this->file = $file;
        $this->isProfilePic = $isProfilePic;
        $this->isCoverPic = $isCoverPic;
        $this->numberInGallery = $numberInGallery;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

    public function __get($prop) {
        return $this->$prop;
    }

}
