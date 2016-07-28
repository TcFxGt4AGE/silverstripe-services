# Silverstripe-Services
A Service module for silverstripe that implements the backend on any pagetype via an extension but does not dictate the frontend!

## Requirements

Peavers - silverstripe-font-awesome
```
https://github.com/peavers/silverstripe-font-awesome
```

## How to use

### Install through composer
```bash
composer require tcfxgt4age/silverstripe-services
```

### Apply to any pagetype you want the "Services" tab to appear on
(Can be applied to multiple page types, just change 'Page' to whatever page you want Services on)
```yaml
Page:
  extensions:
    - ServicesExtension
```

### Use on the frontend

(Customize this with classes, etc to add better frontend viewing)

```
<% if $Services.exists %>
    <% loop $Servics %>
        <i class="fa $Icon"></i>
            <h2>$Title</h2>
            $Defnition
    <% end_loop %>
<% end_if %>
```
