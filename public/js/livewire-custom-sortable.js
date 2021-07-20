import Sortable from '@shopify/draggable/lib/sortable';

window.livewire.directive('sortable-alt', (el, directive, component) => {
    // Only fire this handler on the "root" directive.
    if (directive.modifiers.length > 0) return

    let options = { draggable: '[wire\\:sortable\\.item]' }

    if (el.querySelector('[wire\\:sortable\\.handle]')) {
        options.handle = '[wire\\:sortable\\.handle]'
    }

    const sortable = new Sortable(el, options);

    sortable.on('sortable:stop', () => {
        setTimeout(() => {
            let items = []

            el.querySelectorAll('[wire\\:sortable\\.item]').forEach((el, index) => {
                items.push({ order: index + 1, value: el.getAttribute('wire:sortable.item') })
            })

            component.call(directive.method, items)
        }, 1)
    })
})
