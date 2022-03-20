# SitemapGenerator

The library is developed to generate a sitemap from an input array $inputData, file extension (csv, json, xml)
and path to generated sitemap.

Usage:
<br>

```
use Evster\SitemapGenerator\SitemapRecorder;
use Evster\SitemapGenerator\Constant\SitemapExtensionsConstants;

$inputData = [
    [
        'loc' => 'www.github.com/',
        'lastmod' => '2020-12-14',
        'priority' => 1,
        'changefreq' => 'hourly',  
    ],
];
$sitemap = new SitemapRecorder(
    $inputData,
    SitemapExtensionsConstants::EXTENSION_XML,
    'generated/data.xml'
);

return $sitemap->createSitemap() ? 'Successfully generated.' 
                                 : 'Operation failed.';

```