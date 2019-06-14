<?php

namespace Mvdnbrk\Kiyoh;

use Mvdnbrk\Kiyoh\Client;
use Mvdnbrk\Kiyoh\Resources\Review;
use Mvdnbrk\Kiyoh\Resources\Company;
use Tightenco\Collect\Support\Collection;

class Feed
{
    /**
     * @var \Mvdnbrk\Kiyoh\Client
     */
    protected $apiClient;

    /**
     * The maximum number of reviews to fetch.
     *
     * @var int
     */
    protected $limit;

    /**
     * @var \Mvdnbrk\Kiyoh\Resources\Company;
     */
    public $company;


    /**
     * @var \Tightenco\Collect\Support\Collection
     */
    public $reviews;

    /**
     * Create a new Feed instance.
     *
     * @param  \Mvdnbrk\Kiyoh\Client  $client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;

        $this->limit = 10;

        $this->company = new Company();
        $this->reviews = new Collection();
    }

    /**
     * Get the feed.
     *
     * @return $this
     */
    public function get()
    {
        $response = $this->apiClient->performHttpCall([
            'limit' => $this->getLimit(),
        ]);

        $this->company->fill([
            'locationId' => $response['locationId'],
            'locationName' => $response['locationName'],
            'averageRating' => $response['averageRating'],
            'numberReviews' => $response['numberReviews'],
            'percentageRecommendation' => $response['percentageRecommendation'],
        ]);

        collect($response['reviews'])->each(function ($review) {
            $this->reviews->push(
                new Review($review)
            );
        });

        return $this;
    }

    /**
     * Get the maximum numbers of reviews.
     *
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Set the maximum number of reviews to fetch.
     *
     * @param  int  $value
     * @return $this
     */
    public function limit($value)
    {
        if (is_numeric($value) && $value >= 0) {
            $this->limit = (int) $value;
        }

        return $this;
    }
}
