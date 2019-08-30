<?php

namespace App\Http\Controllers;

use App\Carousel;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Repositories\CarouselRepository;

use App\Http\Requests\StoreCaruosel;
use App\Http\Requests\UpdateCarousel;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CarouselRepository $carouselRepo)
    {
        $carousels = $carouselRepo->getCarousels();
        return view('carousels.index', compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carousels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCaruosel $request) 
    {
        // Retrieve the validated input data...
        $data = $request->validated();

        try {

            if ($data['src'] instanceOf UploadedFile) {
                $data['src'] = $data['src']->store('carousels', ['disk' => 'public']);
            }
        
            $carouselRepo = new CarouselRepository(new Carousel);
            $carouselRepo->createCarousel($data);

            $request->session()->flash('message', 'Create carousel successfully');

            return redirect()->route('carousels.index');
        } catch(CreateCarouselErrorException $e) {
            $request->session()->flash('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function show(Carousel $carousel)
    {
        return $carousel;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function edit(Carousel $carousel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarousel $request, Carousel $carousel)
    {
        // Retrieve the validated input data...
        $data = $request->validated();
        $carouselRepo = new CarouselRepository($carousel);
        $update = $carouselRepo->updateCarousel($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carousel $carousel)
    {
        $carouselRepo = new CarouselRepository($carousel);
        $carouselRepo->deleteCarousel();
        redirect()->back();
    }
}
