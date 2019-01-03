# Laravel Shopping Cart
A shopping cart package for Laravel

## Models

### Item
 - Contains basic product information
 - Items can be modified by Components, Addons, and Variants
 - A Group Item is made up of Components
   - The has_components modifier determines if an Item has Components
 
### Component
 - Components specify how a Group Item is made.
 - Can specify the min and max quantity for a component 
 - Can specify how the component affects the base price for the Group Item 

### Addon

### Variant

### Cart

### CartItem