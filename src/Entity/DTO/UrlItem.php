<?php

namespace Evster\SitemapGenerator\Entity\DTO;

class UrlItem
{
    /**
     * @var string
     */
    private string $loc;

    /**
     * @var string
     */
    private string $lastmod;

    /**
     * @var float
     */
    private float $priority;

    /**
     * @var string
     */
    private string $changefreq;

    /**
     * @return array
     */
    public function __toArray(): array
    {
        return [
            'loc' => $this->loc,
            'lastmod' => $this->lastmod,
            'priority' => $this->getPriority(),
            'changefreq' => $this->changefreq,
        ];
    }

    /**
     * @return string
     */
    public function getLoc(): string
    {
        return $this->loc;
    }

    /**
     * @param string $loc
     * @return UrlItem
     */
    public function setLoc(string $loc): UrlItem
    {
        $this->loc = $loc;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastmod(): string
    {
        return $this->lastmod;
    }

    /**
     * @param string $lastmod
     * @return UrlItem
     */
    public function setLastmod(string $lastmod): UrlItem
    {
        $this->lastmod = $lastmod;

        return $this;
    }

    /**
     * @return float
     */
    public function getPriority(): float
    {
        return $this->priority;
    }

    /**
     * @param float $priority
     * @return UrlItem
     */
    public function setPriority(float $priority): UrlItem
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return string
     */
    public function getChangefreq(): string
    {
        return $this->changefreq;
    }

    /**
     * @param string $changefreq
     * @return UrlItem
     */
    public function setChangefreq(string $changefreq): UrlItem
    {
        $this->changefreq = $changefreq;

        return $this;
    }
}