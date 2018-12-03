<?php
/**
 * Created by PhpStorm.
 * User: bilalisler
 * Date: 12/3/18
 * Time: 10:03 PM
 */

namespace App\Twig;

use App\Entity\ProductsImages;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class FetchAvatarImage extends AbstractExtension
{
    public function getFilters()
    {
        return array(
            new TwigFilter('fetchAvatarImage', array($this, 'fetchAvatarImageMethod')),
        );
    }

    /**
     * @param array $productsImages
     * @param null $defaultImagePath
     * @return null|string
     */
    public function fetchAvatarImageMethod($productsImages, $defaultImagePath = null){
        /**
         * @var $productsImage ProductsImages
         */
        foreach ($productsImages as $productsImage){
            if($productsImage->getIsAvatar() === true){
                return $productsImage->getImage();
            }
        }

        return $defaultImagePath;
    }
}