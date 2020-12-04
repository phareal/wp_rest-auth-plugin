<?php


namespace Dreamwear;


use http\Params;

class ShopController extends \WP_REST_Controller
{



    public function retrieveGendersSubCategory($params){

        $parent_slug = $params["parentSlug"];
        $child_slug = $params["childSlug"];


        $params = [
            'post_type'=>'product',
            'tax_query' => [
        'relation' => 'AND',
        [
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => $parent_slug
        ],
        [
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => $child_slug
        ]
    ],
        ];


        //select * from
        $query = new \WP_Query($params);

        foreach ($query->posts as $post){

            $post->image=get_the_post_thumbnail_url($post->ID);
            $post->price = get_post_meta($post->ID, '_price', true );
        }


        return wp_send_json($query->posts);

    }

}
