<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/admin-page-framework-compiler>
 * <https://en.michaeluno.jp/admin-page-framework>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class AdminPageFramework_FieldType_submit extends AdminPageFramework_FieldType {
    public $aFieldTypeSlugs = array( 'submit', );
    protected $aDefaultKeys = array( 'redirect_url' => null, 'href' => null, 'reset' => null, 'email' => null, 'confirm' => '', 'skip_confirmation' => false, 'attributes' => array( 'class' => 'button button-primary', ), 'save' => false, );
    protected function getEnqueuingScripts()
    {
        return array( array( 'handle_id' => 'admin-page-framework-submit-field-type', 'src' => dirname(__FILE__) . '/js/submit.bundle.js', 'in_footer' => true, 'dependencies' => array( 'jquery', ), ), );
    }
    protected function getField($aField)
    {
        $aField = $this->___getFormattedFieldArray($aField);
        $_aInputAttributes = $this->_getInputAttributes($aField);
        $_aLabelAttributes = $this->___getLabelAttributes($aField, $_aInputAttributes);
        $_aLabelContainerAttributes = $this->___getLabelContainerAttributes($aField);
        return $aField[ 'before_label' ] . "<div " . $this->getAttributes($_aLabelContainerAttributes) . ">" . $this->_getExtraFieldsBeforeLabel($aField) . "<label " . $this->getAttributes($_aLabelAttributes) . ">" . $aField[ 'before_input' ] . $this->_getExtraInputFields($aField) . "<input " . $this->getAttributes($_aInputAttributes) . " />" . $aField[ 'after_input' ] . "</label>" . $this->___getConfirmationCheckbox($aField) . "</div>" . $aField['after_label'];
    }
    private function ___getConfirmationCheckbox($aField)
    {
        if (empty($aField[ 'confirm' ])) {
            return '';
        }
        $_aConfirm = is_string($aField[ 'confirm' ]) ? array( 'label' => $aField[ 'confirm' ] ) : $this->getAsArray($aField[ 'confirm' ]);
        $_aConfirm = $_aConfirm + array( 'label' => $this->oMsg->get('submit_confirmation_label'), 'error' => $this->oMsg->get('submit_confirmation_error'), );
        $_aAttributes = $this->getElementAsArray($aField, array( 'attributes', 'confirm' ));
        $_sInput = $this->getHTMLTag('input', array( 'type' => 'checkbox', 'name' => "{$aField[ 'input_id' ]}[confirm]", 'class' => 'confirm-submit', 'value' => 0, 'data-error-message' => $_aConfirm[ 'error' ], ) + $_aAttributes);
        return "<p class='submit-confirm-container'><label>" . $_sInput . "<span>{$_aConfirm[ 'label' ]}</span>" . "</label></p>";
    }
    private function ___getFormattedFieldArray(array $aField)
    {
        $aField[ 'label' ] = $aField[ 'label' ] ? $aField[ 'label' ] : $this->oMsg->get('submit');
        if (isset($aField[ 'attributes' ][ 'src' ])) {
            $aField[ 'attributes' ][ 'src' ] = esc_url($this->getResolvedSRC($aField[ 'attributes' ][ 'src' ]));
        }
        return $aField;
    }
    private function ___getLabelAttributes(array $aField, array $aInputAttributes)
    {
        return array( 'style' => $aField[ 'label_min_width' ] ? "min-width:" . $this->getLengthSanitized($aField[ 'label_min_width' ]) . ";" : null, 'for' => $aInputAttributes[ 'id' ], 'class' => $aInputAttributes[ 'disabled' ] ? 'disabled' : null, );
    }
    private function ___getLabelContainerAttributes(array $aField)
    {
        return array( 'style' => $aField[ 'label_min_width' ] || '0' === ( string ) $aField[ 'label_min_width' ] ? "min-width:" . $this->getLengthSanitized($aField[ 'label_min_width' ]) . ";" : null, 'class' => 'admin-page-framework-input-label-container' . ' admin-page-framework-input-button-container' . ' admin-page-framework-input-container', );
    }
    protected function _getInputAttributes(array $aField)
    {
        $_bIsImageButton = isset($aField[ 'attributes' ][ 'src' ]) && filter_var($aField[ 'attributes' ][ 'src' ], FILTER_VALIDATE_URL);
        $_sValue = $this->_getInputFieldValueFromLabel($aField);
        return array( 'type' => $_bIsImageButton ? 'image' : 'submit', 'value' => $_sValue, ) + $aField[ 'attributes' ] + array( 'title' => $_sValue, 'alt' => $_bIsImageButton ? 'submit' : '', );
    }
    protected function _getExtraFieldsBeforeLabel(&$aField)
    {
        return '';
    }
    protected function _getExtraInputFields(&$aField)
    {
        $_aOutput = array();
        $_aOutput[] = $this->getHTMLTag('input', array( 'type' => 'hidden', 'name' => "__submit[{$aField[ 'input_id' ]}][input_id]", 'value' => $aField[ 'input_id' ], ));
        $_aOutput[] = $this->getHTMLTag('input', array( 'type' => 'hidden', 'name' => "__submit[{$aField[ 'input_id' ]}][field_id]", 'value' => $aField[ 'field_id' ], ));
        $_aOutput[] = $this->getHTMLTag('input', array( 'type' => 'hidden', 'name' => "__submit[{$aField[ 'input_id' ]}][name]", 'value' => $aField[ '_input_name_flat' ], ));
        $_aOutput[] = $this->___getHiddenInput_SectionID($aField);
        $_aOutput[] = $this->___getHiddenInputByKey($aField, 'redirect_url');
        $_aOutput[] = $this->___getHiddenInputByKey($aField, 'href');
        $_aOutput[] = $this->___getHiddenInput_Reset($aField);
        $_aOutput[] = $this->_getHiddenInput_Email($aField);
        return implode(PHP_EOL, array_filter($_aOutput));
    }
    private function ___getHiddenInput_SectionID(array $aField)
    {
        return $this->getHTMLTag('input', array( 'type' => 'hidden', 'name' => "__submit[{$aField['input_id']}][section_id]", 'value' => isset($aField['section_id']) && '_default' !== $aField['section_id'] ? $aField['section_id'] : '', ));
    }
    private function ___getHiddenInputByKey(array $aField, $sKey)
    {
        return isset($aField[ $sKey ]) ? $this->getHTMLTag('input', array( 'type' => 'hidden', 'name' => "__submit[{$aField['input_id']}][{$sKey}]", 'value' => $aField[ $sKey ], )) : '';
    }
    private function ___getHiddenInput_Reset(array $aField)
    {
        if (! $aField[ 'reset' ]) {
            return '';
        }
        return ! $this->_checkConfirmationDisplayed($aField, $aField[ '_input_name_flat' ], 'reset') ? $this->getHTMLTag('input', array( 'type' => 'hidden', 'name' => "__submit[{$aField['input_id']}][is_reset]", 'value' => '1', )) : $this->getHTMLTag('input', array( 'type' => 'hidden', 'name' => "__submit[{$aField[ 'input_id' ]}][reset_key]", 'value' => is_array($aField[ 'reset' ]) ? implode('|', $aField[ 'reset' ]) : $aField[ 'reset' ], ));
    }
    protected function _getHiddenInput_Email(array $aField)
    {
        if (empty($aField[ 'email' ])) {
            return '';
        }
        if (in_array('submit', $this->aFieldTypeSlugs, true)) {
            $this->showDeprecationNotice('The <code>email</code> argument has been deprecated.', 'the <code>contact</code> field type');
        }
        $_sTransientKey = 'apf_em_' . md5($aField[ '_input_name_flat' ] . get_current_user_id());
        $this->setTransient($_sTransientKey, array( 'nonce' => $this->getNonceCreated('apf_email_nonce_' . md5(( string ) site_url()), 86400), ) + $this->getAsArray($aField[ 'email' ]));
        return ! $this->_checkConfirmationDisplayed($aField, $aField[ '_input_name_flat' ], 'email') ? $this->getHTMLTag('input', array( 'type' => 'hidden', 'name' => "__submit[{$aField[ 'input_id' ]}][confirming_sending_email]", 'value' => '1', )) : $this->getHTMLTag('input', array( 'type' => 'hidden', 'name' => "__submit[{$aField[ 'input_id' ]}][confirmed_sending_email]", 'value' => '1', ));
    }
    protected function _checkConfirmationDisplayed($aField, $sFlatFieldName, $sType='reset')
    {
        switch ($sType) { default: case 'reset': $_sTransientKey = 'apf_rc_' . md5($sFlatFieldName . get_current_user_id()); break; case 'email': $_sTransientKey = 'apf_ec_' . md5($sFlatFieldName . get_current_user_id()); break; }
        $_bConfirmed = ! (false === $this->getTransient($_sTransientKey) && ! $aField['skip_confirmation']);
        if ($_bConfirmed) {
            $this->deleteTransient($_sTransientKey);
        }
        return $_bConfirmed;
    }
    protected function _getInputFieldValueFromLabel($aField)
    {
        if (isset($aField[ 'value' ]) && $aField[ 'value' ] != '') {
            return $aField[ 'value' ];
        }
        if (isset($aField[ 'label' ])) {
            return $aField[ 'label' ];
        }
        if (isset($aField[ 'default' ])) {
            return $aField[ 'default' ];
        }
    }
}
