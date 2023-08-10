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
    
    
}
 
// Instantiate the class object.
new APF_Tabs;