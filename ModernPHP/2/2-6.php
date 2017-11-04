<?php
class DocumentStore
{
    protected $data = [];

    public function addDocument(Documenttable $document)
    {
        $key = $document->getId();
        $value = $document->getContent();
        $this->data[$key] = $value;
    }

    public function getDocuments()
    {
        return $this->data;
    }
}