<?php
class Form
{
    private $fields = array();
    private $action;
    private $submit = "Submit Form";
    private $jumField = 0;

    public function __construct($action, $submit)
    {
        $this->action = $action;
        $this->submit = $submit;
    }

    public function displayForm()
    {
        echo "<form action='" . $this->action . "' method='POST' enctype='multipart/form-data'>";
        echo '<table width="100%" border="0" cellpadding="5" cellspacing="0">';
        
        foreach ($this->fields as $field) {
            echo "<tr>";
            echo "<td width='30%' align='right' valign='top'><strong>" . $field['label'] . ":</strong></td>";
            echo "<td width='70%'>";
            
            switch ($field['type']) {
                case 'textarea':
                    echo "<textarea name='" . $field['name'] . "' cols='40' rows='5' style='width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;'></textarea>";
                    break;
                case 'select':
                    echo "<select name='" . $field['name'] . "' style='width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;'>";
                    echo "<option value=''>-- Pilih --</option>";
                    foreach ($field['options'] as $value => $label) {
                        echo "<option value='" . $value . "'>" . $label . "</option>";
                    }
                    echo "</select>";
                    break;
                case 'radio':
                    echo "<div style='margin:5px 0;'>";
                    foreach ($field['options'] as $value => $label) {
                        echo "<label style='margin-right:15px;'><input type='radio' name='" . $field['name'] . "' value='" . $value . "'> " . $label . "</label> ";
                    }
                    echo "</div>";
                    break;
                case 'checkbox':
                    echo "<div style='margin:5px 0;'>";
                    foreach ($field['options'] as $value => $label) {
                        echo "<label style='margin-right:15px; display:inline-block;'><input type='checkbox' name='" . $field['name'] . "[]' value='" . $value . "'> " . $label . "</label> ";
                    }
                    echo "</div>";
                    break;
                case 'password':
                    echo "<input type='password' name='" . $field['name'] . "' style='width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;'>";
                    break;
                case 'file':
                    echo "<input type='file' name='" . $field['name'] . "' style='width:100%; padding:8px;'>";
                    break;
                case 'number':
                    echo "<input type='number' name='" . $field['name'] . "' step='0.01' style='width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;'>";
                    break;
                default:
                    echo "<input type='text' name='" . $field['name'] . "' style='width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;'>";
                    break;
            }
            echo "</td></tr>";
        }
        
        echo "<tr>";
        echo "<td></td>";
        echo "<td>";
        echo "<input type='submit' value='" . $this->submit . "' style='background:#007bff; color:white; border:none; padding:10px 20px; cursor:pointer; border-radius:4px; margin-top:10px;'>";
        echo "</td>";
        echo "</tr>";
        
        echo "</table>";
        echo "</form>";
    }

    public function addField($name, $label, $type = "text", $options = array())
    {
        $this->fields[$this->jumField]['name'] = $name;
        $this->fields[$this->jumField]['label'] = $label;
        $this->fields[$this->jumField]['type'] = $type;
        $this->fields[$this->jumField]['options'] = $options;
        $this->jumField++;
    }
}
?>