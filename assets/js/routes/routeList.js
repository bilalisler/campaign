import React from 'react'

// Custom Components
import ProductDetailPage from '../pages/ProductDetailPage'

// Page Route List
const routeList = [
  {
    name: 'Ürün Detay',
    text: 'Ürün Detay',
    path: '/:categorySlug([A-Za-z0-9-]+)/:productSlug([A-Za-z0-9\-]+)/product',
    exact: true,
    isMenuItem: true,
    component: ProductDetailPage
  }
];

export default routeList
