<?php


class Services extends DataObject
{

    private static $db = [
        'Title'     => 'Varchar(255)',
        'Definition'   => 'HTMLText',
        'Icon' => 'Varchar(255)',
        'SortOrder' => 'Int'
    ];

    private static $has_one = [
        'Page' => 'Page'
    ];

    private static $default_sort = 'SortOrder';

    private static $field_labels = [
        'Title'   => 'Service Title',
        'Definition' => 'Definition',
        'Icon' => 'Service Icon'
    ];

    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {

            $fields->addFieldsToTab('Root.Main', [
                TextField::create('Title', 'Service Title'),
                HtmlEditorField::create('Definition', 'Definition')->setRows(20),
                FontAwesomeField::create('Icon', 'Font Awesome Icon')
            ]);

            $fields->removeByName('SortOrder');
            $fields->removeByName('PageID');
        });

        $fields = parent::getCMSFields();

        return $fields;
    }

    public function canView($member = null)
    {
        return true;
    }

    public function canEdit($member = null)
    {
        return true;
    }

    public function canDelete($member = null)
    {
        return true;
    }

    public function canCreate($member = null)
    {
        return true;
    }
}
