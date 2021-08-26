<?php
namespace AHT\CustomChekout\Plugin\Checkout\Model\Checkout;

class LayoutProcessor
 {
     /**
     * @param \Magento\Checkout\Block\Checkout\LayoutProcessor $subject
     * @param array $jsLayout
     * @return array
     */
    public function afterProcess(\Magento\Checkout\Block\Checkout\LayoutProcessor $subject, array $jsLayout)
    { $jsLayout['components']['checkout']['children']['steps']['children']['delivery-step']['children']
        ['field-group-delivery']['children']['delivery-date'] = [
            'component' => 'Magento_Ui/js/form/element/date',
            'config' => [
                'customScope' => 'deliveryStepFields',
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/date',
                'id' => 'delivery_date_field'
            ],
            'dataScope' => 'deliveryStepFields.delivery_date',
            'label' => __('Delivery date'),
            'options' => [
                 'dateFormat' => 'y/MM/dd',
                 'showsTime' => false
             ],
            'validation' => ['required-entry' => true],
            'provider' => 'checkoutProvider',
            'visible' => true,
            'sortOrder' => 1,
            'id' => 'date_field'
        ];

        $jsLayout['components']['checkout']['children']['steps']['children']['delivery-step']['children']
        ['field-group-delivery']['children']['delivery-comment'] = [
            'component' => 'Magento_Ui/js/form/element/textarea',
            'config' => [
                'customScope' => 'deliveryStepFields',
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/textarea',
                'id' => 'delivery_comment_field',
                'cols' => 15,
                'rows' => 5
                ],
            'dataScope' => 'deliveryStepFields.delivery_comment',
            'label' => __('Delivery comment'),
            'provider' => 'checkoutProvider',
            'visible' => true,
            'sortOrder' => 2,
            'id' => 'comment_field'
        ];

        return $jsLayout;
    }

 }
