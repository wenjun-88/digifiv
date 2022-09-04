

export default {

  createAButton({label, icon, href, className, ...params}) {
    return `<a class="btn btn-sm ${className}" href="${href}" ${_.map(params, (value, key) => `${key}="${value}"`).join(' ')}>
   ${icon}<span class="d-none d-md-inline-block${icon? ' ml-1' : ''}">${label}</span>
 </a>`;
  },

  createButton({label, icon, onclick, className, title = '', ...params}) {
    return `<button class="btn btn-sm ${className}" type="button" onclick="${onclick}" title="${title}" ${_.map(params, (value, key) => `${key}="${value}"`).join(' ')}>
  ${icon}<span class="d-none d-md-inline-block${icon? ' ml-1' : ''}">${label}</span>
</button>`;
  },

  createViewButton(href, options = {}) {
    options = {
      label: 'View',
      icon: '<i class="fa fa-fw fa-eye"></i>',
      className: 'btn-success',
      href,
      ...options,
    };
    return Utils.createAButton(options);
  },

  createEditButton(href, options = {}) {
    options = {
      label: 'Edit',
      icon: '<i class="fa fa-fw fa-edit"></i>',
      className: 'btn-warning',
      href,
      ...options,
    };
    return Utils.createAButton(options);
  },

  createDeleteButton(onclick, options = {}) {
    options = {
      label: 'Delete',
      icon: '<i class="fa fa-fw fa-trash-alt"></i>',
      className: 'btn-danger',
      onclick,
      ...options,
    }
    return Utils.createButton(options);
  },
};
