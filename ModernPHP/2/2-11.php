<?php
namespace ModernPHP\Second;
require "./2-6.php";
require "./2-7.php";
require "./2-8.php";
require "./2-9.php";
require "./2-10.php";

$documentStore = new DocumentStore();

//添加HTML文档
$htmlDoc = new HtmlDocument('https://php.net');
$documentStore->addDocument($htmlDoc);

//添加流文档
$streamDoc = new StreamDocument(fopen('stream.txt', 'rb'));
$documentStore->addDocument($streamDoc);

//添加终端命令文档
$cmdDoc = new CommandOutputDocument('cat /etc/hosts');
$documentStore->addDocument($cmdDoc);

echo "<pre>";
print_r($documentStore->getDocuments());