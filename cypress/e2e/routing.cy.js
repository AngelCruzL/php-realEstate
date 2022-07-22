/// <reference types="cypress" />

describe('Test on header and footer routing navigation', () => {
  it('Test the header navigation', () => {
    cy.visit('/');
    cy.get('[data-cy="navigationHeader"]').should('exist');
    cy.get('[data-cy="navigationHeader"]').find('a').should('have.length', 4);
    cy.get('[data-cy="navigationHeader"]')
      .find('a')
      .should('not.have.length', 1);
    cy.get('[data-cy="navigationHeader"]')
      .find('a')
      .should('not.have.length', 6);

    cy.get('[data-cy="navigationHeader"]')
      .find('a')
      .eq(0)
      .invoke('attr', 'href')
      .should('equal', '/nosotros');
    cy.get('[data-cy="navigationHeader"]')
      .find('a')
      .eq(0)
      .invoke('text')
      .should('equal', 'Nosotros');

    cy.get('[data-cy="navigationHeader"]')
      .find('a')
      .eq(1)
      .invoke('attr', 'href')
      .should('equal', '/anuncios');
    cy.get('[data-cy="navigationHeader"]')
      .find('a')
      .eq(1)
      .invoke('text')
      .should('equal', 'Anuncios');

    cy.get('[data-cy="navigationHeader"]')
      .find('a')
      .eq(2)
      .invoke('attr', 'href')
      .should('equal', '/blog');
    cy.get('[data-cy="navigationHeader"]')
      .find('a')
      .eq(2)
      .invoke('text')
      .should('equal', 'Blog');

    cy.get('[data-cy="navigationHeader"]')
      .find('a')
      .eq(3)
      .invoke('attr', 'href')
      .should('equal', '/contacto');
    cy.get('[data-cy="navigationHeader"]')
      .find('a')
      .eq(3)
      .invoke('text')
      .should('equal', 'Contacto');
  });

  it('Test the footer navigation', () => {
    cy.get('[data-cy="navigationFooter"]').should('exist');
    cy.get('[data-cy="navigationFooter"]').find('a').should('have.length', 4);
    cy.get('[data-cy="navigationFooter"]')
      .find('a')
      .should('not.have.length', 1);
    cy.get('[data-cy="navigationFooter"]')
      .find('a')
      .should('not.have.length', 6);

    cy.get('[data-cy="navigationFooter"]')
      .find('a')
      .eq(0)
      .invoke('attr', 'href')
      .should('equal', '/nosotros');
    cy.get('[data-cy="navigationFooter"]')
      .find('a')
      .eq(0)
      .invoke('text')
      .should('equal', 'Nosotros');

    cy.get('[data-cy="navigationFooter"]')
      .find('a')
      .eq(1)
      .invoke('attr', 'href')
      .should('equal', '/anuncios');
    cy.get('[data-cy="navigationFooter"]')
      .find('a')
      .eq(1)
      .invoke('text')
      .should('equal', 'Anuncios');

    cy.get('[data-cy="navigationFooter"]')
      .find('a')
      .eq(2)
      .invoke('attr', 'href')
      .should('equal', '/blog');
    cy.get('[data-cy="navigationFooter"]')
      .find('a')
      .eq(2)
      .invoke('text')
      .should('equal', 'Blog');

    cy.get('[data-cy="navigationFooter"]')
      .find('a')
      .eq(3)
      .invoke('attr', 'href')
      .should('equal', '/contacto');
    cy.get('[data-cy="navigationFooter"]')
      .find('a')
      .eq(3)
      .invoke('text')
      .should('equal', 'Contacto');

    cy.get('[data-cy="copyright"]')
      .should('have.prop', 'class')
      .should('equal', 'copyright');
  });
});
