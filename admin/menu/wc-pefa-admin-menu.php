<?php

/**
 * 
 * Admin Menu Register
 * 
 */
include( dirname( __FILE__ ) . '/admin-page-framework/library/apf/admin-page-framework.php' );
    

class APF_Tabs extends AdminPageFramework {
    
    public function setUp() {
                   
        $this->setRootMenuPageBySlug( 'edit.php?post_type=product' );   
                           
        $this->addSubMenuItem(
            array(
                'title'        => 'Extra Fields',
                'page_slug'    => 'product_extra_fields'
            )
        ); 
        
        $this->addInPageTabs(
            'product_extra_fields',
            array(
                'tab_slug'  =>    'laminate',
                'title'     =>    __( 'Laminate', 'wc-pefa' ),
            ),        
            array(
                'tab_slug'  =>    'cam_color',
                'title'     =>    __( 'CAMBIAR COLORES', 'wc-pefa' ),
            ),                    
            array(
                'tab_slug'  =>    'nombre',
                'title'     =>    __( 'NOMBRE/NUMERO', 'wc-pefa' ),
            ),              
            array(
                'tab_slug'  =>    'extra_settings',
                'title'     =>    __( 'Settings', 'wc-pefa' ),
            )
        );    
 
        $this->setPageHeadingTabsVisibility( false ); 
        $this->setInPageTabTag( 'h2' ); 
    }
    
    
    public function load_product_extra_fields_laminate( $oAdminPage ) {
    
        $this->addSettingSections(    
            array(
                'section_id'    => 'laminate_content',    
                'page_slug'     => 'product_extra_fields',    
            )
        );
        
        $this->addSettingFields(
            array(    
                'field_id'      => 'laminate_title',
                'section_id'    => 'laminate_content',
                'title'         => 'Title',
                'type'          => 'text',
                'default'       => 'LAMINADO',
            ),

            array(    
                'field_id'      => 'laminate_selection',
                'section_id'    => 'laminate_content',
                'title'         => 'Selection Field',
                'type'          => 'text',
                'repeatable'    => true,
                'default'       => 'Glossy',
            ),

            array(    
                'field_id'      => 'laminate_link',
                'section_id'    => 'laminate_content',
                'title'         => 'ver diferencia de laminados (link)',
                'type'          => 'text',
            ),


            array(    
                'field_id'      => 'submit',
                'type'          => 'submit',
            )
        );
        
    }

    public function load_product_extra_fields_extra_settings( $oAdminPage ) {
        $this->addSettingSections(    
            array(
                'section_id'    => 'settings_content',    
                'page_slug'     => 'product_extra_fields',    
            )
        );

        $this->addSettingFields(
            array(    
                'field_id'      => 'section_1_wrapper',
                'section_id'    => 'settings_content',
                'title'         => '<h1>Section 1 Content</h1>',
            ),
            array(    
                'field_id'      => 'section_1_heading',
                'section_id'    => 'settings_content',
                'title'         => 'Heading',
                'type'          => 'text',
                'default'       => 'PERSONALIZACIÓN'
            ),
            array(    
                'field_id'      => 'section_1_video_link',
                'section_id'    => 'settings_content',
                'title'         => 'Video Link',
                'type'          => 'text',
            ),
            array(    
                'field_id'      => 'section_1_des',
                'section_id'    => 'settings_content',
                'title'         => 'Subtitle',
                'type'          => 'textarea',
                'default'       => 'SI NO SELECCIONA NINGUNO NO ABRAN MODIFICACIONES AL DISEÑO DE LA IMAGEN (ORIGINAL)',
                'attributes'    => array(
                    'rows' => 6,
                    'cols' => 60,
                ),
            ),
            array(    
                'field_id'      => 'section_1_submit',
                'type'          => 'submit',
            )
        );

        $this->addSettingFields(
            array(    
                'field_id'      => 'section_2_wrapper',
                'section_id'    => 'settings_content',
                'title'         => '<h1>Section 2 Content</h1>',
            ),
            array(    
                'field_id'      => 'section_2_heading',
                'section_id'    => 'settings_content',
                'title'         => 'Heading',
                'type'          => 'text',
                'default'       => 'PERSONALIZACIÓN'
            ),
            array(    
                'field_id'      => 'section_2_des',
                'section_id'    => 'settings_content',
                'title'         => 'Subtitle',
                'type'          => 'textarea',
                'default'       => 'SI NO SELECCIONA NINGUNO NO ABRAN MODIFICACIONES AL DISEÑO DE LA IMAGEN (ORIGINAL)',
                'attributes'    => array(
                    'rows' => 6,
                    'cols' => 60,
                ),
            ),
            array(    
                'field_id'      => 'section_2_submit',
                'type'          => 'submit',
            )
        );

        $this->addSettingFields(
            array(    
                'field_id'      => 'section_3_wrapper',
                'section_id'    => 'settings_content',
                'title'         => '<h1>Section 3 Content</h1>',
            ),
            array(    
                'field_id'      => 'section_3_heading',
                'section_id'    => 'settings_content',
                'title'         => 'Heading',
                'type'          => 'text',
                'default'       => 'PERSONALIZACIÓN'
            ),
            array(    
                'field_id'      => 'section_3_des',
                'section_id'    => 'settings_content',
                'title'         => 'Subtitle',
                'type'          => 'textarea',
                'default'       => 'SI NO SELECCIONA NINGUNO NO ABRAN MODIFICACIONES AL DISEÑO DE LA IMAGEN (ORIGINAL)',
                'attributes'    => array(
                    'rows' => 6,
                    'cols' => 60,
                ),
            ),
            array(    
                'field_id'      => 'section_3_bottom_des',
                'section_id'    => 'settings_content',
                'title'         => 'Bottom Subtitle',
                'type'          => 'textarea',
                'default'       => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe quisquam facilis facere itaque',
                'attributes'    => array(
                    'rows' => 6,
                    'cols' => 60,
                ),
            ),
            array(    
                'field_id'      => 'section_3_submit',
                'type'          => 'submit',
            )
        );
    }
    
    
}
 
// Instantiate the class object.
new APF_Tabs;