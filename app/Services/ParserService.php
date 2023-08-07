<?php


namespace App\Services;


use App\Models\News;
use App\Services\Contracts\Parser;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as ParserXml;

class ParserService implements Parser
{

    private string $link;
    private int $sourceId = 0;

    public function setLink(string $link): ParserService
    {
        $this->link = $link;
        return $this;
    }

    public function setSourceId(int $sourceId): ParserService
    {
        $this->sourceId = $sourceId;
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

        $arrayPath = explode('/', trim($this->link, '/'));
        $fileName = end($arrayPath);
        Storage::append('parse_news/'.$fileName.'.txt', json_encode($data));
    }

    public function loadInBaseParseDate(): void
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
        foreach ($data['news'] as $n) {
            $n['category_id'] = 0;
            $img = $n['image'] ?? 'news_images/no_img.png';

            $news = News::create($n);
            $news['image'] = $img;
            $news['source_id'] = $this->sourceId;

            if (!$news->save()) {
                throw new \Exception('Новость не добавлена!');
            }
        }
    }

}
