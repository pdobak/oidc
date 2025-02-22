<?php

declare(strict_types=1);

/**
 * @copyright Copyright (c) 2022-2023 Thorsten Jagel <dev@jagel.net>
 *
 * @author Thorsten Jagel <dev@jagel.net>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 */
namespace OCA\OIDCIdentityProvider\Controller;

use OC\Security\Bruteforce\Throttler;
use OCP\AppFramework\ApiController;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\Response;
use OCP\IRequest;
use Psr\Log\LoggerInterface;

class CorsController extends ApiController
{
	/** @var Throttler */
	private $throttler;
	/** @var LoggerInterface */
	private $logger;

	public function __construct(
					string $appName,
					IRequest $request,
					Throttler $throttler,
					LoggerInterface $logger
					)
	{
		parent::__construct($appName, $request);
		$this->throttler = $throttler;
		$this->logger = $logger;
	}

	/**
	 * @PublicPage
	 * @NoCSRFRequired
	 *
	 * @return Response
	 */
	public function discoveryCorsResponse(): Response {
		return $this->corsResponse();
	}

	/**
	 * @PublicPage
	 * @NoCSRFRequired
	 *
	 * @return Response
	 */
	public function jwksCorsResponse(): Response {
		return $this->corsResponse();
	}

	/**
	 * @PublicPage
	 * @NoCSRFRequired
	 *
	 * @return Response
	 */
	public function userInfoCorsResponse(): Response {
		return $this->corsResponse();
	}

	/**
	 * @PublicPage
	 * @NoCSRFRequired
	 *
	 * @return Response
	 */
	public function logoutCorsResponse(): Response {
		return $this->corsResponse();
	}

	/**
	 * @PublicPage
	 * @NoCSRFRequired
	 *
	 * @return Response
	 */
	public function tokenCorsResponse(): Response {
		return $this->corsResponse();
	}

	/**
	 * @PublicPage
	 * @NoCSRFRequired
	 *
	 * @return Response
	 */
	public function authorizeCorsResponse(): Response {
		return $this->corsResponse();
	}


	private function corsResponse(): Response {
		$response = new Response();
		$response->addHeader('Access-Control-Allow-Origin', '*');
		$response->addHeader('Access-Control-Allow-Methods', 'PUT, POST, GET, DELETE, PATCH');
		$response->addHeader('Access-Control-Max-Age', '1728000');
		$response->addHeader('Access-Control-Allow-Headers', 'Authorization, Content-Type, Accept');
		$response->addHeader('Access-Control-Allow-Credentials', 'false');
		return $response;
	}

}
