<?php

class ServicesExtension extends SiteTreeExtension
{

    private static $has_many = [
        'Services' => 'Services'
    ];

    public function updateCMSFields(FieldList $fields)
    {

        /** @var GridFieldConfig $gridConfig */
        $gridConfig = GridFieldConfig::create();

        $gridConfig
            ->addComponent(new GridFieldButtonRow('before'))
            ->addComponent(new GridFieldAddNewButton('buttons-before-left'))
            ->addComponent(new GridFieldToolbarHeader())
            ->addComponent(new  GridFieldSortableHeader())
            ->addComponent(new GridFieldSortableRows('SortOrder'))
            ->addComponent($dataColumns = new GridFieldDataColumns())
            ->addComponent(new GridFieldEditButton())
            ->addComponent(new GridFieldDeleteAction())
            ->addComponent(new GridFieldDetailForm());

        $dataColumns->setDisplayFields([
            'Title'          => 'Service Title',
            'Definition.Summary' => 'Definition Preview',
            'Icon' => 'FontAwesomeIcon',
        ]);
        
        /** @var TabSet $rootTab */
            //We need to repush Metadata to ensure it is the last tab
            $rootTab = $fields->fieldByName('Root');
        $rootTab->push(Tab::create('Services'));
        if ($rootTab->fieldByName('Metadata')) {
            $metaChildren = $rootTab->fieldByName('Metadata')->getChildren();
            $rootTab->removeByName('Metadata');
            $rootTab->push(Tab::create('Metadata')->setChildren($metaChildren));
        }

        $GridField = GridField::create('Services', 'Services', $this->owner->Services(), $gridConfig);

        $fields->addFieldToTab('Root.Services', $GridField);

        return $fields;
    }
}
