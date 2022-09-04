'use strict';

function createAButton(label, href, className, icon = '') {
  const buttonHtml = `
				<a href='${href}' class='btn btn-sm ${className}'>
					${icon}<span class="d-none d-md-inline-block ml-1">${label}</span>
				</a>
			`;
  return buttonHtml;
}

function createButton(label, className, icon = '', onclick = '', ...props)
{
  const buttonHtml = `
      <button class="btn btn-sm ${className}" type="${props.type || 'button'}" onclick="${onclick}" ${props.join(' ')}>
          ${icon}<span class="d-none d-md-inline-block ml-1">${label}</span>
      </button>
    `;
  return buttonHtml;
}
