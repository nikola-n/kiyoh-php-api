<?php

namespace Mvdnbrk\Kiyoh\Resources;

class Company extends BaseResource
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $url;

    /**
     * @var float
     */
    public $aggregate_rating;

    /**
     * @va int
     */
    public $review_count;

    /**
     * @var int
     */
    public $views;

    /**
     * Get the review count attribute,
     *
     * @return intt
     */
    public function getReviewCountAttribute()
    {
        return (int) $this->review_count;
    }

    /**
     * Sets aggregate rating for this company.
     *
     * @param  float|string  $value
     * @return  void
     */
    public function setAggregateRatingAttribute($value)
    {
        $this->aggregate_rating = (float) $value;
    }

    /**
     * Sets total review count for this company.
     *
     * @param  int|string  $value
     * @return  void
     */
    public function setReviewCountAttribute($value)
    {
        $this->review_count = (int) $value;
    }

    /**
     * Alias for setReviewCountAttribute().
     *
     * @param  int|string  $value
     * @return  void
     */
    public function setTotalReviewsAttribute($value)
    {
        $this->setReviewCountAttribute($value);
    }

    /**
     * Alias for setAggregateRatingAttribute().
     *
     * @param  float|string  $value
     * @return  void
     */
    public function setTotalScoreAttribute($value)
    {
        $this->setAggregateRatingAttribute($value);
    }

    /**
     * Sets the views for this company.
     *
     * @param  int|string  $value
     * @return  void
     */
    public function setViewsAttribute($value)
    {
        $this->views = (int) $value;
    }

    /**
     * Alias for setViewsAttribute().
     *
     * @param  int|string  $value
     * @return  void
     */
    public function setTotalViewsAttribute($value)
    {
        $this->setViewsAttribute($value);
    }
}
