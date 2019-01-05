<?php
/**
 * Created by PhpStorm.
 * User: bilalisler
 * Date: 12/3/18
 * Time: 10:03 PM
 */

namespace App\Twig;

use App\Entity\ProductComments;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class GetRating extends AbstractExtension
{
    private $startViews = ['active' => '<i class="fa fa-star active" style="color: #ffc600;"></i>','half' => '<i class="fa fa-star-half-full active" style="color: #ffc600;"></i>','passive' => '<i class="fa fa-star"></i>'];

    public function getFilters()
    {
        return array(
            new TwigFilter('getRating', array($this, 'ratingCalculate')),
        );
    }

    /**
     * @param array $productsImages
     * @param null $defaultImagePath
     * @return null|string
     */
    public function ratingCalculate($comments,$view = false){

        $totalRating = 0;

        /**
         * @var $comments ProductComments[]
         */
        foreach ($comments as $comment){
           $totalRating += $comment->getRating();
        }

        if(count($comments) === 0){
            return $view ? $this->viewStarts(0) : 0;
        }

        $rating = floatval($totalRating / count($comments));
        $rating = round($rating,1);

        return $view ? $this->viewStarts($rating) : $rating;
    }

    private function viewStarts(float $rating){
        $halfStar = ($rating * 10) % 10; // for example: value = 3.6  and i want to get the number after zero, 0.6 => 3.6*10 = 36 % 10 = 6

        $starView = '';

        for ($i = 1; $i <= (ProductComments::MAX_RATING - ($halfStar > 0 ? 1 : 0)); $i++){
            if($i <= intval($rating)){
                $starView .= $this->startViews['active'];
            }else{
                if($halfStar > 0){
                    $starView .= $this->startViews['half'];
                    $halfStar = 0;
                }else{
                    $starView .= $this->startViews['passive'];
                }
            }
        }

        return $starView;
    }
}