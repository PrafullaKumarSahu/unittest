<?php
namespace App\Repositories;

use App\Carousel;
use App\Exceptions\CreateCarouselErrorException;
use App\Exceptions\CarouselNotFoundException;
use App\Exceptions\UpdateCarouselErrorException;
use Illuminate\Database\QueryException;

class CarouselRepository
{
    protected $model;
    /***
     * CarouselRepository constructor
     * @param Carousel $carousel
     */
    public function __construct(Carousel $carousel)
    {
        $this->model = $carousel;
    }

    /*** 
     * @param array $data
     * @return Carousel
     * @throws CreateCarouselErrorException
    */
    public function createCarousel(array $data) : Carousel
    {
        try {
            return $this->model->create($data);
        } catch(QueryExceptioon $e ) {
            throw new CreateCarouselErrorException($e);
        }
    }

    /** 
     * @param int $id
     * @return Carousel
     * @throws CarouselNotFoundException
    */
    public function findCarousel($carouselId) : Carousel
    {
        try {
            return $this->model->findOrFail($carouselId);
        } catch(QueryExceptioon $e ) {
            throw new CarouselNotFoundException($e);
        }
    }

    /** 
     * @param array $data
     * @return bool
     * @through UpdateCarouselErrorException
    */
    public function updateCarousel(array $data) : bool
    {
        try {
            return $this->model->update($data);
        } catch ( QueryException $e ) {
            throw new UpdateCarouselErrorException($e);
        }
    }

    /**
    * @return bool
    */
    public function deleteCarousel() : bool
    {
        return $this->model->delete();
    }
}
?>