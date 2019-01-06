<?php
/**
 * Created by PhpStorm.
 * User: bilalisler
 * Date: 12/3/18
 * Time: 10:03 PM
 */

namespace App\Twig;

use App\Entity\ProductComments;
use App\Entity\Products;
use App\Entity\ShopProfile;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class GetRating extends AbstractExtension
{
    private $startViews = ['active' => '<i class="fa fa-star active" style="color: #ffc600;"></i>','half' => '<i class="fa fa-star-half-full active" style="color: #ffc600;"></i>','passive' => '<i class="fa fa-star"></i>'];

    public function getFilters()
    {
        return array(
            new TwigFilter('getProductRating', array($this, 'ratingCalculate')),
            new TwigFilter('getCommentRating', array($this, 'commentRating')),
            new TwigFilter('getShopRating', array($this, 'shopRating')),
        );
    }

    /**
     * @param $comments
     * @param bool $view
     * @return float|int|string
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


    public function commentRating(ProductComments $comment,$view = false){

        $commentRating = $comment->getRating();

        if(count($comment->getRating()) === 0){
            return $view ? $this->viewStarts(0) : 0;
        }

        return $view ? $this->viewStarts($commentRating) : $commentRating;
    }


    public function shopRating(ShopProfile $shop,$view = false,$percent = false){

        $products = $shop->getProducts();

        $shopRating = 0;


        $totalComment = 0;
        /**
         * @var $product Products
         */
        foreach ($products as $product) {

            $productRating = 0;

            foreach ($product->getComments() as $comment){
                $productRating += $comment->getRating();
                $totalComment +=1;
            }

            $shopRating += $productRating;
        }

        $shopRating = $shopRating / ($totalComment === 0 ? 1 : $totalComment);

        if($percent){
            return $shopRating*100/ProductComments::MAX_RATING;
        }

        return $view ? $this->viewStarts($shopRating) : $shopRating;
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