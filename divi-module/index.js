import { ModuleContainer } from '@divi/module';
import metadata from './module.json';

/**
 * WebJIVE Pricing Tables DIVI 5 Module
 * 
 * This module integrates the WebJIVE Pricing Tables plugin with DIVI 5's
 * visual builder, providing a native module experience.
 */

const WebJIVEPricingTablesModule = {
  metadata,

  // Render function for the module
  render: ({ attrs }) => {
    const { tableId } = attrs;

    // If no table selected, show placeholder
    if (!tableId || tableId === '0') {
      return (
        <ModuleContainer>
          <div style={{
            padding: '40px',
            textAlign: 'center',
            background: '#f7f7f7',
            border: '2px dashed #ddd',
            borderRadius: '8px'
          }}>
            <div style={{ fontSize: '48px', marginBottom: '16px' }}>📊</div>
            <h3 style={{ margin: '0 0 8px 0', color: '#333' }}>
              WebJIVE Pricing Table
            </h3>
            <p style={{ margin: '0', color: '#666' }}>
              Select a pricing table from the module settings
            </p>
          </div>
        </ModuleContainer>
      );
    }

    // Render the actual pricing table using WordPress shortcode
    return (
      <ModuleContainer>
        <div dangerouslySetInnerHTML={{ 
          __html: window.wpApiSettings?.pricingTableShortcode?.(tableId) || ''
        }} />
      </ModuleContainer>
    );
  },

  // Dynamic content for the visual builder
  dynamicContent: ({ attrs }) => {
    const { tableId } = attrs;
    
    if (!tableId || tableId === '0') {
      return null;
    }

    // Fetch table data via WordPress REST API
    return fetch(`/wp-json/webjive-pricing-tables/v1/table/${tableId}`)
      .then(response => response.json())
      .catch(() => null);
  }
};

export default WebJIVEPricingTablesModule;
