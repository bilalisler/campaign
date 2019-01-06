import React from 'react'

// Jquery
import $ from 'jquery'

// Bootstrap
import { Button } from 'react-bootstrap';

// Styling
import '../../css/tab.css'

class ProductDetailPage extends React.Component {
    constructor(){
        super();
        this.state = {"activeTab":1};

        this.selectTab = this.selectTab.bind(this);
    }

    componentDidMount(){
        this.refreshTabs();

        $("div.product-detail-content").hide();
        $("div.content-comments").hide();
        $("div.footer-map").hide();

        var productDetail = $("div.product-detail-content").html();
        var productComments = $("div.content-comments").html();
        var shopMap = $("div.footer-map").html();

        $(".tab-contents .tabContent:eq(0)").html(productDetail);
        $(".tab-contents .tabContent:eq(1)").html(productComments);
        $(".tab-contents .tabContent:eq(2)").html(shopMap);
    }

    refreshTabs(){
        console.log(this.state['activeTab']);

        $(".tab-list div.tab").removeClass('activeTab');
        $(".tab-contents .tabContent").hide();

        $(".tab-contents .tabContent").eq((this.state['activeTab'] - 1)).show();
        $(".tab-list div.tab").eq((this.state['activeTab'] - 1)).addClass('activeTab');

    }

    selectTab(event){
        event.preventDefault();

        var element = event.target;
        var tabId = $(element).attr("tab-id");

        this.state = {"activeTab":tabId};

        this.refreshTabs();
    }

    render () {
        return (
            <div>
                <div className="tab-list row">
                    <div className="col-md-4 tab">
                        <a onClick={this.selectTab} tab-id="1">
                            Ürün Bilgileri
                        </a>
                    </div>
                    <div className="col-md-4 tab">
                        <a onClick={this.selectTab} tab-id="2">
                            Yorumlar
                        </a>
                    </div>
                    <div className="col-md-4 tab">
                        <a onClick={this.selectTab} tab-id="3">
                            Ulaşım
                        </a>
                    </div>
                </div>
                <div className="clearfix"></div>
                <div className="tab-contents row">
                    <div className="col-md-12 tabContent" tab-id="1"></div>
                    <div className="col-md-12 tabContent" tab-id="2"></div>
                    <div className="col-md-12 tabContent" tab-id="3"></div>
                </div>
                <div className="clearfix"></div>
            </div>
        )
    }
}

export default ProductDetailPage
