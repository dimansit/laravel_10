<?php


namespace App\Services;


use App\Services\Contracts\Parser;
use Orchestra\Parser\Xml\Facade as ParserXml;

class ParserService implements Parser
{

    private string $link;

    public function setLink(string $link): ParserService
    {
        $this->link = $link;
        return $this;
    }

    public function sacParseDate(): void
    {

        $xml = ParserXml::load($this->link);
        $data = $xml->parse([
            'title'       => [
                'uses' => 'channel.title'
            ],
            'link'        => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image'       => [
                'uses' => 'channel.image.url'
            ],
            'news'        => [
                'uses' => 'channel.item[title,link,author,category,pubDate,description]'
            ]
        ]);

    }
}
