<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;

/**
 * Sitemap Controller
 *
 * Generates a dynamic XML sitemap that automatically includes
 * all active products and categories pulled from the database.
 * No static file is needed - the sitemap is always up-to-date.
 *
 * URL: /sitemap.xml
 */
class Sitemap extends BaseController
{
    public function index(): \CodeIgniter\HTTP\Response
    {
        $categoryModel = new CategoryModel();
        $productModel  = new ProductModel();

        $baseUrl    = rtrim(base_url(), '/') . '/';
        $categories = $categoryModel->getActiveCategories();
        $products   = $productModel
            ->select('slug, updated_at')
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->findAll();

        // Static pages with their last-mod and change frequency
        $staticPages = [
            [
                'url'        => $baseUrl,
                'lastmod'    => date('Y-m-d'),
                'changefreq' => 'daily',
                'priority'   => '1.0',
            ],
            [
                'url'        => $baseUrl . 'shop',
                'lastmod'    => date('Y-m-d'),
                'changefreq' => 'daily',
                'priority'   => '0.9',
            ],
            [
                'url'        => $baseUrl . 'shitabi-gifts',
                'lastmod'    => date('Y-m-d'),
                'changefreq' => 'weekly',
                'priority'   => '0.8',
            ],
            [
                'url'        => $baseUrl . 'about',
                'lastmod'    => date('Y-m-d'),
                'changefreq' => 'monthly',
                'priority'   => '0.6',
            ],
            [
                'url'        => $baseUrl . 'contact',
                'lastmod'    => date('Y-m-d'),
                'changefreq' => 'monthly',
                'priority'   => '0.5',
            ],
            [
                'url'        => $baseUrl . 'privacy-policy',
                'lastmod'    => date('Y-m-d'),
                'changefreq' => 'yearly',
                'priority'   => '0.3',
            ],
            [
                'url'        => $baseUrl . 'terms-conditions',
                'lastmod'    => date('Y-m-d'),
                'changefreq' => 'yearly',
                'priority'   => '0.3',
            ],
        ];

        // Build XML output
        $xml  = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . "\n";
        $xml .= '        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"' . "\n";
        $xml .= '        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9' . "\n";
        $xml .= '        http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . "\n";

        // --- Static pages ---
        foreach ($staticPages as $page) {
            $xml .= $this->buildUrl(
                $page['url'],
                $page['lastmod'],
                $page['changefreq'],
                $page['priority']
            );
        }

        // --- Category pages ---
        foreach ($categories as $category) {
            $lastmod = !empty($category['updated_at'])
                ? date('Y-m-d', strtotime($category['updated_at']))
                : date('Y-m-d');

            $xml .= $this->buildUrl(
                $baseUrl . 'category/' . $category['slug'],
                $lastmod,
                'weekly',
                '0.7'
            );
        }

        // --- Product pages ---
        foreach ($products as $product) {
            $lastmod = !empty($product['updated_at'])
                ? date('Y-m-d', strtotime($product['updated_at']))
                : date('Y-m-d');

            $xml .= $this->buildUrl(
                $baseUrl . 'product/' . $product['slug'],
                $lastmod,
                'weekly',
                '0.8'
            );
        }

        $xml .= '</urlset>';

        $response = $this->response;
        $response->setHeader('Content-Type', 'application/xml; charset=utf-8');
        $response->setBody($xml);

        return $response;
    }

    /**
     * Build a single <url> XML block.
     */
    private function buildUrl(string $loc, string $lastmod, string $changefreq, string $priority): string
    {
        return "  <url>\n"
            . '    <loc>' . htmlspecialchars($loc, ENT_XML1, 'UTF-8') . "</loc>\n"
            . "    <lastmod>{$lastmod}</lastmod>\n"
            . "    <changefreq>{$changefreq}</changefreq>\n"
            . "    <priority>{$priority}</priority>\n"
            . "  </url>\n";
    }
}
